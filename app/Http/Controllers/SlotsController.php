<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Slots;
use App\User;
use App\Action;
use App\Payment;
use App\SlotsData;
use Auth;
use Redis;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SlotsController extends Controller {
    public function init(Request $r) {
        switch($r->provider) {
            case 'list':
                $slots = Slots::where('show', 1)->orderBy('priority', 'desc')->orderBy('id', 'asc')->paginate(21);
            break;

            case 'netent':
                $slots = Slots::where('show', 1)->where('provider', 'netent')->orderBy('id', 'asc')->paginate(21);
            break;

            case 'playngo':
                $slots = Slots::where('show', 1)->where('provider', 'playngo')->orderBy('id', 'asc')->paginate(21);
            break;

            case 'pragmatic':
                $slots = Slots::where('show', 1)->where('provider', 'pragmatic')->orderBy('id', 'asc')->paginate(21);
            break;

            case 'redtiger':
                $slots = Slots::where('show', 1)->where('provider', 'redtiger')->orderBy('id', 'asc')->paginate(21);
            break;

            case 'relax':
                $slots = Slots::where('show', 1)->where('provider', 'relax')->orderBy('id', 'asc')->paginate(21);
            break;

            default:
                $slots = Slots::where('show', 1)->orderBy('priority', 'desc')->orderBy('id', 'asc')->paginate(18);
        }

        if(isset($r->search)) {
            $slots = Slots::where([['show', 1], ['title', 'LIKE', '%'. $r->search .'%']])->orderBy('priority', 'desc')->orderBy('id', 'asc')->paginate(16);
        }

        return $slots;
    }

    public function getSlotWithPagenate(Request $r)
    {
        $category = $r->provider;
        if($category == 'all') $category = '';
        $search = $r->search;
        $db = Slots::query();
        if($category) $db->where('provider', $category);
        if(strlen($search) > 0) $db->where('title', 'LIKE', '%' . $search . '%');
        $db->where('show', 1);
        $db = $db->orderBy('priority', 'desc')->get();

        $slots = $this->paginate($db, $r->count, $r->page);
        return $slots;
    }

    public function paginate($items, $perPage = 20, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function getRandom() {
        $slot = Slots::where([['show', 1]])->inRandomOrder()->get();

        return response()->json(['id' => $slot[0]->game_id]);
    }

    public function countSlots() {
        $providers = ['all', 'netent', 'pragmatic', 'playngo', 'redtiger', 'relax', 'amatic', 'pushgaming'];
        $names = [
            'all' => 'Все игры',
            'netent' => 'NetEnt',
            'pragmatic' => 'Pragmatic Play',
            'playngo' => 'Play’n GO',
            'redtiger' => 'Red Tiger',
            'relax' => 'Relax Gaming',
            'amatic' => 'Amatic',
            'pushgaming' => 'Push Gaming'
        ];

        $count = [];

        foreach($providers as $p) {
            if($p == 'all') {
                $slots = Slots::where([['show', 1]])->count();
            }
            else {
                $slots = Slots::where([['provider', $p], ['show', 1]])->count();
            }

            $count[] = ['provider' => $p, 'name' => $names[$p], 'games' => $slots];
        }

        return $count;
    }

    public function loadSlot(Request $r) {
        if(Auth::guest()) return [
            'error' => true,
            'message' => 'Авторизуйтесь'
        ];

        if(Auth::user()->ban) return [
            'error' => true,
            'message' => 'Ваш аккаунт заблокирован'
        ];

        $slot = Slots::where('show', 1)->where('game_id', $r->id)->first();
        $type = $r->type;

        if(!$slot) return [
            'error' => true,
            'message' => 'Данный слот не найден'
        ];

        $user = User::where('id', Auth::id())->first();

        $psum = Payment::where([['created_at', '>=', \Carbon\Carbon::today()->subDays(7)], ['user_id', $user->id], ['status', 1]])->sum('sum');

        if(!$this->user->is_admin && $psum < 100) {
            return [
                'error' => true,
                'message' => 'Для игры в слоты необходим депозит 100р за 7 дней'
            ];
        }

        if($user->auth_token == null) {
            $user->auth_token = bin2hex(random_bytes(20));
        }

        $user->current_id = $slot->game_id;
        $user->save();

        $link = "https://partners.casinomobule.com/".($type == 'demo' ? 'games.startDemo' : 'games.start')."?partner.alias=".($user->is_youtuber ? 'windox1' : 'windox')."&partner.session={$user->auth_token}&game.provider={$slot->provider}&game.alias={$slot->alias}&lang=ru&lobby_url=https://stimule.life/slots&currency=RUB&mobile=false";

        return response()->json(['title' => $slot->title, 'link' => $link]);
    }

    public function callback($method, Request $r) {
        switch($method) {
            case 'trx.cancel':
                return $this->trxCancel($r);
            break;

            case 'trx.complete':
                return $this->trxComplete($r);
            break;

            case 'check.session':
                return $this->checkSession($r);
            break;

            case 'check.balance':
                return $this->checkBalance($r);
            break;

            case 'withdraw.bet':
                return $this->userBet($r);
            break;

            case 'deposit.win':
                return $this->userWin($r);
            break;

            default:
                throw new \Exception("Unknown method");
        }
    }

    private function trxCancel($data) {
        return response()->json(['status' => 200]);
    }

    private function trxComplete($data) {
        return response()->json(['status' => 200]);
    }

    private function checkSession($data) {
        if(!$data->session) return response()->json(['status' => 404, 'method' => 'check.session', 'message' => 'Unknown session']);
        $user = User::where('auth_token', $data->session)->first();
        if(!$user) return response()->json(['status' => 404, 'method' => 'check.session', 'message' => 'Unknown user']);

        return response()->json(['status' => 200, 'method' => 'check.session', 'response' => ['id_player' => $user->id, 'id_group' => 'default', 'balance' => round($user->balance * 100)]]);
    }

    private function checkBalance($data) {
        if(!$data->session) return response()->json(['status' => 404, 'method' => 'check.balance', 'message' => 'Unknown session']);
        $user = User::where('auth_token', $data->session)->first();
        if(!$user) return response()->json(['status' => 404, 'method' => 'check.balance', 'message' => 'Unknown user']);

        return response()->json(['status' => 200, 'method' => 'check.balance', 'response' => ['currency' => 'RUB', 'balance' => round($user->balance * 100)]]);
    }

    public function userBet($data) {
        if(!$data->session) return response()->json(['status' => 404, 'method' => 'withdraw.bet', 'message' => 'Unknown session']);

        $user = User::where('auth_token', $data->session)->first();
        if(!$user) return response()->json(['status' => 404, 'method' => 'withdraw.bet', 'message' => 'Unknown user']);

        if($user->balance < ($data->amount / 100)) return response()->json(['status' => 404, 'method' => 'withdraw.bet', 'message' => 'Unknown user']);

        $user->balance -= $data->amount / 100;

        $wager = $user->wager - $data->amount / 100;
        if($wager < 0) $wager = 0;

        $user->wager = $wager;
        $user->current_bet = $data->amount / 100;
        $user->slots -= $data->amount / 100;
        $user->save();

        if(!(\Cache::has('user.'.$user->id.'.historyBalance'))){ \Cache::put('user.'.$user->id.'.historyBalance', '[]'); }

        $hist_balance =	array(
            'user_id' => $user->id,
            'type' => 'Ставка в Slots',
            'balance_before' => round($user->balance + $data->amount / 100, 2),
            'balance_after' => round($user->balance, 2),
            'date' => date('d.m.Y H:i:s')
        );

        $cashe_hist_user = \Cache::get('user.'.$user->id.'.historyBalance');

        $cashe_hist_user = json_decode($cashe_hist_user);
        $cashe_hist_user[] = $hist_balance;
        $cashe_hist_user = json_encode($cashe_hist_user);
        \Cache::put('user.'.$user->id.'.historyBalance', $cashe_hist_user);

        return response()->json(['status' => 200, 'method' => 'withdraw.bet', 'response' => ['currency' => 'RUB', 'balance' => round($user->balance * 100)]]);
    }

    public function userWin($data) {
        if(!$data->session) return response()->json(['status' => 404, 'method' => 'deposit.win', 'message' => 'Unknown session']);
        $user = User::where('auth_token', $data->session)->first();
        if(!$user) return response()->json(['status' => 404, 'method' => 'deposit.win', 'message' => 'Unknown user']);
        $slot = Slots::where('game_id', $user->current_id)->first();
        if(!$slot) return response()->json(['status' => 404, 'method' => 'deposit.win', 'message' => 'Unknown slot']);

        $user->balance += $data->amount / 100;
        $user->slots += $data->amount / 100;
        $user->save();

        if($data->amount > 0) {
            if(!(\Cache::has('user.'.$user->id.'.historyBalance'))){ \Cache::put('user.'.$user->id.'.historyBalance', '[]'); }

            $hist_balance =	array(
                'user_id' => $user->id,
                'type' => 'Выигрыш в Slots',
                'balance_before' => round($user->balance - $data->amount / 100, 2),
                'balance_after' => round($user->balance, 2),
                'date' => date('d.m.Y H:i:s')
            );

            $cashe_hist_user = \Cache::get('user.'.$user->id.'.historyBalance');

            $cashe_hist_user = json_decode($cashe_hist_user);
            $cashe_hist_user[] = $hist_balance;
            $cashe_hist_user = json_encode($cashe_hist_user);
            \Cache::put('user.'.$user->id.'.historyBalance', $cashe_hist_user);
        }

        if($data->amount > 0) {
            $slotId = SlotsData::create([
                'user_id' => $user->id,
                'slot_id' => $user->current_id,
                'amount' => $data->amount / 100
            ]);
        }

        if((($data->amount / 100) / $user->current_bet) > 1) {
            Redis::publish('slotsHistory', json_encode([
                'id' => $slotId->id,
                'game_id' => $user->current_id,
                'image' => '/assets/image/slots/'. implode('', explode(' ', $slot->title)) .'.jpg',
                'slot_name' => $slot->title,
                'username' => $user->username,
                'coef' => number_format((($data->amount / 100) / $user->current_bet), 2),
                'win' => $data->amount / 100
            ]));
        }

        return response()->json(['status' => 200, 'method' => 'deposit.win', 'response' => ['currency' => 'RUB', 'balance' => round($user->balance * 100)]]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redis;

use App\User;
use App\Game;
use App\Setting;
use App\Profit;
use App\Action;
use Auth;
use DB;

class DiceController extends Controller
{
    public function bet(Request $request) : array {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:1|max:1000000',
            'chance' => 'required|numeric|min:1|max:95',
            'type' => [
                Rule::in(['min', 'center', 'max']),
                'required'
            ]
        ]);

        if($validator->fails()) {
            return [
                'error' => true,
                'message' => $validator->errors()->first()
            ];
        }

        $bet = $request->amount;
        $chance = $request->chance;
        $type = $request->type;

        if($request->amount > $this->user->balance) {
            return [
                'error' => true,
                'message' => 'Недостаточно средств'
            ];
        }

        if($this->user->ban) {
            return [
                'error' => true,
                'message' => 'Ваш аккаунт заблокирован'
            ];
        }

        DB::beginTransaction();

        $this->user = User::where('id', $this->user->id)
            ->lockForUpdate()
            ->first();

        $this->user->decrement('balance', $bet);
        $this->user->decrement('wager', $bet / 100 * 10);
        $this->user->decrement('dice', $bet);

        if($this->user->wager < 0) $this->user->update([
            'wager' => 0
        ]);

        $random = rand(0, 999999);

        $min = round(($chance / 100) * 999999, 0);
        $middle['min'] = round((100 - $chance) * 10000 / 2, 0);
        $middle['max'] = round((100 - $chance) * 10000 / 2, 0) + round(($chance / 100) * 999999, 0);
        $max = 999999 - round(($chance / 100) * 999999, 0);

        $win = round((100 / $chance) * $bet, 2);
        $isWin = false;

        $setting = Setting::query()->find(1);
        $profit = Profit::query()->find(1);

        if($setting->antiminus == 1 && !$this->user->is_youtuber) {
            if($win - $bet > $profit->bank_dice) {
                switch($type) {
                    case 'min':
                        $random = rand(($chance * 10000) - 1, 999999);
                    break;

                    case 'center':
                        $random = rand(0, $middle['min'] - 1);
                    break;

                    case 'max':
                        $random = rand(0, 1000000 - ($chance * 10000));
                    break;
                }
            }
        }

        switch($type) {
            case 'min':
                if($random <= $min) $isWin = true;
            break;
            case 'center':
                if($random >= $middle['min'] && $random <= $middle['max']) $isWin = true;
            break;
            case 'max':
                if($random >= $max) $isWin = true;
            break;
        }

        $text = 'Выпало ' . $random;

        if($isWin) {
            $win = number_format($win, 2, '.', '');
            $text = 'Выигрыш ' . $win;
            $this->user->increment('balance', $win);
            $this->user->increment('dice', $win);

            if($setting->antiminus == 1 && !$this->user->is_youtuber) {
                $profit->update([
                    'bank_dice' => $profit->bank_dice - ($win - $bet),
                ]);
            }
        } else {
            if(!$this->user->is_youtuber) {
                $profit->update([
                    'bank_dice' => $profit->bank_dice + ($bet / 100) * (100 - $profit->comission),
                    'earn_dice' => $profit->earn_dice + ($bet / 100) * $profit->comission
                ]);
            }
        }

        $game = Game::create([
            'user_id' => $this->user->id,
            'game' => 'dice',
            'bet' => $bet,
            'chance' => $chance,
            'win' => $isWin ? $win : 0,
            'type' => $isWin ? 'win' : 'lose',
            'fake' => 0
        ]);

        DB::commit();

        if($isWin) {
            Redis::publish('newGame', json_encode([
                'id' => $game->id,
                'type' => 'dice',
                'username' => $this->user->username,
                'amount' => $bet,
                'coeff' => round($win / $bet, 2),
                'result' => $isWin ? $win : 0
            ]));
        }

        if(!(\Cache::has('user.'.$this->user->id.'.historyBalance'))){ \Cache::put('user.'.$this->user->id.'.historyBalance', '[]'); }

        $hist_balance =	array(
			'user_id' => $this->user->id,
			'type' => 'Ставка в Dice',
			'balance_before' => round($isWin ? $this->user->balance - ($win - $bet) : $this->user->balance + $bet, 2),
			'balance_after' => round($this->user->balance, 2),
			'date' => date('d.m.Y H:i:s')
		);

		$cashe_hist_user = \Cache::get('user.'.$this->user->id.'.historyBalance');

		$cashe_hist_user = json_decode($cashe_hist_user);
		$cashe_hist_user[] = $hist_balance;
		$cashe_hist_user = json_encode($cashe_hist_user);
		\Cache::put('user.'.$this->user->id.'.historyBalance', $cashe_hist_user);

        return [
            'status' => $isWin,
            'text' => $text,
            'balance' => $this->user->balance
        ];
    }
}

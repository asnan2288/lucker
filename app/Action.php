<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = [
        'user_id',
        'action',
        'balanceBefore',
        'balanceAfter'
    ];
}

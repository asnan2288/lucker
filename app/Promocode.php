<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    protected $fillable = [
        'name', 'sum', 'activation', 'wager', 'type', 'end_time'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mine extends Model
{
    protected $fillable = ['user_id', 'amount', 'bombs', 'step', 'grid', 'status', 'fake'];
}

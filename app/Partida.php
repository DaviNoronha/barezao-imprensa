<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    protected $table = 'partidas';

    public function time()
    {
        return $this->belongsTo(Time::class);
    }
}

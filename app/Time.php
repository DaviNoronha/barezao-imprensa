<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = 'times';

    protected $fillable = [
        'time', 'empresa'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function jogadores()
    {
        return $this->hasMany(Jogador::class);
    }
}

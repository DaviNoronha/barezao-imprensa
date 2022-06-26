<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    protected $table = 'jogadores';

    protected $fillable = [
        'nome', 'documento', 'time_id'
    ];

    public function time()
    {
        return $this->belongsTo(Time::class);
    }
}

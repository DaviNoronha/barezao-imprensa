<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    protected $table = 'jogadores';

    protected $fillable = [
        'nome', 'numero', 'nome_camisa', 'cpf', 'documento', 'foto', 'tipo', 'funcao', 'time_id', 'data_nascimento'
    ];

    public function time()
    {
        return $this->belongsTo(Time::class);
    }
}

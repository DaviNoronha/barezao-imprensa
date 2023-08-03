<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    protected $table = 'jogadores';

    protected $fillable = [
        'nome', 'numero', 'nome_camisa', 'cpf', 'documento', 'foto', 'tipo', 'funcao', 'time_id', 'data_nascimento'
    ];
    protected $appends = ['idade', 'tipo_formatted'];

    protected const TIPOS = [
        0 => 'Imprensa',
        1 => 'Estrangeiro',
        2 => 'Convidado'
    ];

    public function time()
    {
        return $this->belongsTo(Time::class)->withoutGlobalScopes();
    }

    public function getIdadeAttribute()
    {
        return $this->data_nascimento ? Carbon::createFromFormat('d/m/Y', $this->data_nascimento)->age : null;  
    }

    public function getTipoFormattedAttribute()
    {
        return self::TIPOS[$this->tipo];  
    }

    protected static function booted()
    {
        static::addGlobalScope('ancient', function (Builder $builder) {
            $builder->whereYear('created_at', Carbon::now()->year);
        });
    }
}

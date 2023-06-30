<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = 'times';

    protected $fillable = [
        'time', 'empresa', 'escudo', 'logo'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function jogadores()
    {
        return $this->hasMany(Jogador::class)->withoutGlobalScopes();
    }

    protected static function booted()
    {
        static::addGlobalScope('ancient', function (Builder $builder) {
            $builder->whereYear('created_at', Carbon::now()->year);
        });
    }
}

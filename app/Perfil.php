<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfis';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

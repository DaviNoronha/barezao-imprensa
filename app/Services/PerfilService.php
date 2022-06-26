<?php

namespace App\Services;

use App\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class PerfilService
{
    public static function list() {
        try {
            return Perfil::all();
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }
}

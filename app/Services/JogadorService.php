<?php

namespace App\Services;

use App\Jogador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class JogadorService
{
    public static function list() {
        try {
            return Jogador::with('time')->get();
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function find($id)
    {
        try {
            return Jogador::where('id', $id)->with('time')->first();
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function store($request)
    {
        try {
            $request['time_id'] = $request['time_id'] == 0 ? null : $request['time_id'];
            return Jogador::create($request);

            // if ($request->documento) {
            //         $arquivo = $request->documento;
            //         $jogador->documento = $arquivo->store('jogador/' . $jogador->id);
            // }
        } catch (Throwable $th) {
            dd($th->getMessage());
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }

    }

    public static function update($request, $jogador)
    {
        try {
            $request['time_id'] = $request['time_id'] == 0 ? null : $request['time_id'];
            $jogador->update($request);
            return $jogador;
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function destroy($Jogador)
    {
        try {
            return $Jogador->delete();
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }
}

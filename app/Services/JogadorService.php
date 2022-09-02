<?php

namespace App\Services;

use App\Jogador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class JogadorService
{
    public static function list($timeId = null) {
        try {
            return Jogador::when($timeId, function ($q) use($timeId) {
                $q->where('time_id', $timeId);
            })->with('time')->get();
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
            return Jogador::create([
                'nome' => $request->nome,
                'numero' => $request->numero,
                'nome_camisa' => $request->nome_camisa,
                'cpf' => $request->cpf,
                'documento' => $request->file('documento')->store('documentos/' . $request->time_id . '/' . $request->numero),
                'foto' => $request->file('foto')->store('jogador_fotos/' . $request->time_id . '/' . $request->numero),
                'tipo' => $request->tipo,
                'funcao' => $request->funcao,
                'tipo' => $request->tipo,
                'time_id' => $request->time_id,
                'data_nascimento' => $request->data_nascimento,
            ]);
        } catch (Throwable $th) {
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
            $jogador->nome = $request->nome;
            $jogador->numero = $request->numero;
            $jogador->nome_camisa = $request->nome_camisa;
            $jogador->cpf = $request->cpf;
            $jogador->documento = isset($request->documento) ? $request->file('documento')->store('documentos/' . $request->time_id . '/' . $request->numero) : $jogador->documento;
            $jogador->foto = isset($request->foto) ? $request->file('foto')->store('jogador_fotos/' . $request->time_id . '/' . $request->numero) : $jogador->foto;
            $jogador->tipo = $request->tipo;
            $jogador->funcao = $request->funcao;
            $jogador->tipo = $request->tipo;
            $jogador->time_id = $request->time_id;
            $jogador->data_nascimento = $request->data_nascimento;
            return $jogador->update();
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function destroy($jogador)
    {
        try {
            return $jogador->delete();
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }
}

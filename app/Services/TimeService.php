<?php

namespace App\Services;

use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class TimeService
{
    public static function list($timeId = null) {
        try {
            return Time::when($timeId, function ($q) use ($timeId) {
                $q->where('id', $timeId);
            })->get();
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
            return Time::where('id', $id)->first();
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
            return Time::create([
                'time' => $request->time,
                'empresa' => $request->empresa,
                'escudo' => $request->file('escudo')->store('escudos_times/' . $request->time)
            ]);
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function update($request, $time)
    {
        try {
            $time->time = $request->time;
            $time->empresa = $request->empresa;
            $time->escudo = isset($request->escudo) ? $request->file('escudo')->store('escudos_times/' . $request->time) : $time->escudo;
            $time->save();
            return $time;
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function destroy($time)
    {
        try {
            return $time->delete();
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }
}

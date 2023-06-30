<?php

namespace App\Services;

use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Throwable;

class TimeService
{
    public static function list() {
        try {
            return Time::all();
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function listByEdicao() {
        try {
            return Time::withoutGlobalScopes()->whereYear('created_at', Carbon::now()->subYear()->year)->get();
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
            return Time::withoutGlobalScopes()->where('id', $id)->first();
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
                'escudo' => $request->file('escudo')->store('escudos_times/' . $request->time),
                'logo' => $request->file('logo')->store('logos_empresas/' . $request->time)
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
            $time->logo = isset($request->logo) ? $request->file('logo')->store('logos_empresas/' . $request->time) : $time->logo;
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

    public static function selectTimes($timeId = null) {
        try {
            $retorno = [];
            $times = Time::whereYear('created_at', Carbon::now()->year)
                ->when($timeId, function ($q) use ($timeId) {
                    $q->where('id', $timeId);
                })
                ->get(); 
            foreach ($times as $time) {
                $retorno[$time->id] = "$time->empresa - $time->time";
            }
            return $retorno;
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }
}

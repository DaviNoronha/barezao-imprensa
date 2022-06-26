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
            return Time::where('id', $id)->with(['time', 'perfil'])->first();
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
            return Time::create($request);
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
            $time->update($request);
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

//     public static function changeStatus($request, $time)
//     {
//         try {
//             $time->status = $request->status;
//             $time->save();
//             return $time;
//         } catch (Throwable $th) {
//             Log::error([
//                 'mensagem' => $th->getMessage(),
//                 'linha' => $th->getLine(),
//                 'arquivo' => $th->getFile()
//             ]);
//         }
//     }
}

<?php

namespace App\Services;

use App\Time;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserService
{
    public static function list()
    {
        try {
            return User::with(['time', 'perfil'])->get();
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
            return User::where('id', $id)->with(['time', 'perfil'])->first();
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
            $request['password'] = bcrypt($request['password']);
            $request['time_id'] = $request['time_id'] == 0 ? null : $request['time_id'];
            return User::create($request);
        } catch (Throwable $th) {
            dd($request->messages());
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function update($request, $user)
    {
        try {
            $request['password'] = $request['password'] ? bcrypt($request['password']) : $user->password;
            $request['time_id'] = $request['time_id'] == 0 ? null : $request['time_id'];
            $user->update($request);
            return $user;
        } catch (Throwable $th){
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function destroy($user)
    {
        try {
            return $user->delete();
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\PerfilService;
use App\Services\TimeService;
use App\Services\UserService;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('users.index');
    }

    public function create(User $user)
    {
        return view('users.create', [
            'times' => TimeService::list(),
            'perfis' => PerfilService::list(),
        ]);
    }

    public function store(UserRequest $request)
    {
        $user = UserService::store($request->all());
        if ($user) {
            return view('users.index', [
                'success' => true,
                'mensagem' => 'Usuário cadastrado com sucesso!',
            ]);
        }
        return redirect()->route('user.create')->with('errors', $request->messages());
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'times' => TimeService::list(),
            'perfis' => PerfilService::list(),
            'user' => $user,
        ]);
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        UserService::update($request->all(), $user);
        if ($user) {
            return view('users.index', [
                'success' => true,
                'mensagem' => 'Informações do usuário atualizadas com sucesso!',
            ]);
        }
        return redirect()->route('user.edit', $user->id)->with('errors', $request->messages());
    }

    public function destroy(User $user)
    {
        $user = UserService::destroy($user);
        if ($user) {
            return view('users.index', [
                'success' => true,
                'mensagem' => 'Usuário deletado com sucesso!',
            ]);
        }
        return redirect()->route('user.index')->with('error', 'Erro deletar o usuário!');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = UserService::list();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    return view('components.acoes', [
                        'data' => $data,
                        'tipo' => 'user'
                    ]);
                })
                ->addColumn('perfil', function($data){
                    return $data->perfil->descricao;
                })
                ->addColumn('time', function($data){
                    return $data->time->time ?? 'N/A';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}

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
            return view('users.create', [
                'success' => true,
                'times' => TimeService::list(),
                'perfis' => PerfilService::list(),
            ]);
        } else {
            return view('users.create', [
                'success' => false,
                'times' => TimeService::list(),
                'perfis' => PerfilService::list(),
            ]);
        }
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
        return redirect()->route('user.index', $user->id);
    }

    public function destroy(User $user)
    {
        $user = UserService::destroy($user);

        return redirect()->route('user.index')->with('success', 'Usuário deletado com sucesso!');
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

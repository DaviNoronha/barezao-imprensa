<?php

namespace App\Http\Controllers;

use App\Http\Requests\JogadorRequest;
use App\Http\Requests\JogadorUpdateRequest;
use App\Jogador;
use App\Services\JogadorService;
use App\Services\TimeService;
use Illuminate\Http\Request;
use DataTables;
use Auth;

class JogadorController extends Controller
{
    public function index()
    {
        return view('jogadores.index');
    }

    public function create()
    {
        return view('jogadores.form', [
            'times' => TimeService::selectTimes(Auth::user()->time->id ?? null),
        ]);
    }

    public function store(JogadorRequest $request)
    {
        $jogador = JogadorService::store($request);
        if ($jogador) {
            return view('jogadores.index', [
                'success' => true,
                'mensagem' => 'Inscrição do jogador realizada com sucesso',
            ]);
        }

        return redirect()->route('jogador.create')->with('errors', $request->messages());
    }

    public function show(int $jogadorId)
    {
        return view('jogadores.show', [
            'jogador' => JogadorService::find($jogadorId)
        ]);
    }

    public function edit(Jogador $jogador)
    {
        return view('jogadores.form', [
            'jogador' => $jogador,
            'times' => TimeService::selectTimes(Auth::user()->time->id ?? null),
        ]);
    }

    public function update(JogadorUpdateRequest $request, Jogador $jogador)
    {
        JogadorService::update($request, $jogador);
        if ($jogador) {
            return view('jogadores.index', [
                'success' => true,
                'mensagem' => 'Informações do jogador atualizadas com sucesso!',
            ]);
        }
        return redirect()->route('jogador.edit', $jogador->id)->with('errors', $request->messages());
    }

    public function destroy(Jogador $jogador)
    {
        $jogador = JogadorService::destroy($jogador);
        if ($jogador) {
            return view('jogadores.index', [
                'success' => true,
                'mensagem' => 'Jogador deletado com sucesso!',
            ]);
        }

        return redirect()->route('jogador.index')->with('errors', 'Erro ao deletar usuário!');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = JogadorService::list($request->timeId);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    return view('components.acoes', [
                        'data' => $data,
                        'tipo' => 'jogador'
                    ]);
                })
                ->editColumn('time', function($data){
                    return $data->time->time;
                })
                ->editColumn('tipo', function($data){
                    return $data->tipo == '0' ? 'Imprensa' : 'Estrangeiro';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function pesquisar(Request $request)
    {
        return JogadorService::jogadorByNome($request->search);
    }

}

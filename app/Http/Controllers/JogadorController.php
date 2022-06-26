<?php

namespace App\Http\Controllers;

use App\Jogador;
use App\Services\JogadorService;
use App\Services\TimeService;
use Illuminate\Http\Request;
use DataTables;

class JogadorController extends Controller
{
    public function index()
    {
        return view('jogadores.index');
    }

    public function create()
    {
        return view('jogadores.create', [
            'times' => TimeService::list(),
        ]);
    }

    public function store(Request $request)
    {
        $jogador = JogadorService::store($request->all());
        if ($jogador) {
            return view('jogadores.create', [
                'success' => true,
                'times' => TimeService::list()
            ]);
        } else {
            return view('jogadores.create', [
                'success' => false,
                'times' => TimeService::list()
            ]);
        }

    }

    public function show(Jogador $jogador)
    {
        return view('jogadores.show');
    }

    public function edit(Jogador $jogador)
    {
        return view('jogadores.edit', [
            'jogador' => $jogador,
            'times' => TimeService::list(),
        ]);
    }

    public function update(Request $request, Jogador $jogador)
    {
        JogadorService::update($request->all(), $jogador);
        return redirect()->route('jogador.index', $jogador->id);
    }

    public function destroy(Jogador $jogador)
    {
        $jogador = JogadorService::destroy($jogador);

        return redirect()->route('jogador.index')->with('success', 'Jogador deletado com sucesso!');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = JogadorService::list();
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
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}

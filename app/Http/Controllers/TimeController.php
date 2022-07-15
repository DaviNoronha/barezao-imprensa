<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeRequest;
use App\Services\JogadorService;
use App\Services\TimeService;
use App\Time;
use Illuminate\Http\Request;
use DataTables;

class TimeController extends Controller
{
    public function index()
    {
        $times = Time::all();
        return view('times.index', [
            'times' => $times
        ]);
    }

    public function create()
    {
        return view('times.create');
    }

    public function store(TimeRequest $request)
    {
        $time = TimeService::store($request);
        if ($time) {
            return view('times.index', [
                'success' => true,
                'mensagem' => 'Time inscrito com sucesso!',
            ]);
        }
        return redirect()->route('time.create')->with('errors', $request->messages());

    }

    public function edit(Time $time)
    {
        return view('times.edit', [
            'time' => $time,
        ]);
    }

    public function update(TimeRequest $request, Time $time)
    {
        TimeService::update($request, $time);
        if ($time) {
            return view('times.index', [
                'success' => true,
                'mensagem' => 'Informações do time atualizadas com sucesso!',
            ]);
        }
        return redirect()->route('time.edit', $time->id)->with('errors', $request->messages());
    }

    public function destroy(Time $time)
    {
        $time = TimeService::destroy($time);
        if ($time) {
            return view('times.index', [
                'success' => true,
                'mensagem' => 'Time deletado com sucesso',
            ]);
        }
        return redirect()->route('time.index')->with('errors', 'Erro ao deletar o time');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = TimeService::list();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    return view('components.acoes', [
                        'data' => $data,
                        'tipo' => 'time'
                    ]);
                })
                ->editColumn('escudo', function($data){
                    return view('components.escudo', [
                        'time' => $data,
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function jogadores(Time $time)
    {
            return view('times.jogadores', [
            'time' => TimeService::find($time->id)
        ]);
    }


    public function datatableJogadores(Request $request)
    {
        if ($request->ajax()) {
            $data = JogadorService::list($request->timeId);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $rota = route('jogador.show', $data->id);
                    $button = '<a href="'.$rota.'" class="btn btn-sm btn-default"><i class="fas fa-eye"></i></a>';
                    return $button;
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

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeRequest;
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
        $time = TimeService::store($request->all());
        if ($time) {
            return view('times.create', [
                'success' => true,
            ]);
        } else {
            return view('times.create', [
                'success' => false,
            ]);
        }
    }

    public function edit(Time $time)
    {
        return view('times.edit', [
            'time' => $time,
        ]);
    }

    public function update(TimeRequest $request, Time $time)
    {
        TimeService::update($request->all(), $time);
        return redirect()->route('time.index', $time->id);
    }

    public function destroy(Time $time)
    {
        $time = TimeService::destroy($time);

        return redirect()->route('time.index')->with('success', 'Time deletado com sucesso!');
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
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}

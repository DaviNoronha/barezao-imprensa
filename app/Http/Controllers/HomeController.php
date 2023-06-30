<?php

namespace App\Http\Controllers;

use App\Services\TimeService;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard', [
            'times' => TimeService::list()
        ]);
    }

    public function edicaoTimes()
    {
        return view('edicao.times', [
            'times' => TimeService::listByEdicao()
        ]);
    }

    public function edicaoJogadores(int $timeId)
    {
        return view('edicao.jogadores', [
            'time' => TimeService::find($timeId)
        ]);
    }
}

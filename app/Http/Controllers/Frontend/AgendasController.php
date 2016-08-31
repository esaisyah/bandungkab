<?php

namespace App\Http\Controllers\Frontend;

use App\Agenda;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AgendasController extends Controller
{
    public function index()
    {
        $agendas = Agenda::orderBy('id', 'desc')->paginate(10);
        return view('frontend.agendas.index', compact('agendas'));
    }

    public function show($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('frontend.agendas.show', compact('agenda'));
    }
}

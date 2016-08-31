<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Agenda;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class AgendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $agendas = Agenda::paginate(15);

        return view('backend.agendas.index', compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('backend.agendas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nama' => 'required', 'tanggal' => 'required', 'content' => 'required', ]);

        Agenda::create($request->all());

        Session::flash('flash_message', 'Agenda added!');

        return redirect('admin/agendas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $agenda = Agenda::findOrFail($id);

        return view('backend.agendas.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);

        return view('backend.agendas.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['nama' => 'required', 'tanggal' => 'required', 'content' => 'required', ]);

        $agenda = Agenda::findOrFail($id);
        $agenda->update($request->all());

        Session::flash('flash_message', 'Agenda updated!');

        return redirect('admin/agendas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Agenda::destroy($id);

        Session::flash('flash_message', 'Agenda deleted!');

        return redirect('admin/agendas');
    }
}

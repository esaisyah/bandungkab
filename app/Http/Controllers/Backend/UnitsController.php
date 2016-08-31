<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Unit;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $units = Unit::paginate(15);

        return view('backend.units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('backend.units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nama' => 'required', 'alamat' => 'required', 'no_telepon' => 'required', ]);

        Unit::create($request->all());

        Session::flash('flash_message', 'Unit added!');

        return redirect('admin/units');
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
        $unit = Unit::findOrFail($id);

        return view('backend.units.show', compact('unit'));
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
        $unit = Unit::findOrFail($id);

        return view('backend.units.edit', compact('unit'));
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
        $this->validate($request, ['nama' => 'required', 'alamat' => 'required', 'no_telepon' => 'required', ]);

        $unit = Unit::findOrFail($id);
        $unit->update($request->all());

        Session::flash('flash_message', 'Unit updated!');

        return redirect('admin/units');
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
        Unit::destroy($id);

        Session::flash('flash_message', 'Unit deleted!');

        return redirect('admin/units');
    }
}

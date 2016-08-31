<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Place;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $places = Place::paginate(15);

        return view('backend.places.index', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('backend.places.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nama' => 'required', 'daerah' => 'required', 'alamat' => 'required', 'gambar' => 'required', ]);

        Place::create($request->all());

        Session::flash('flash_message', 'Place added!');

        return redirect('admin/places');
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
        $place = Place::findOrFail($id);

        return view('backend.places.show', compact('place'));
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
        $place = Place::findOrFail($id);

        return view('backend.places.edit', compact('place'));
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
        $this->validate($request, ['nama' => 'required', 'daerah' => 'required', 'alamat' => 'required', ]);

        $place = Place::findOrFail($id);
        $place->update($request->all());

        Session::flash('flash_message', 'Place updated!');

        return redirect('admin/places');
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
        Place::destroy($id);

        Session::flash('flash_message', 'Place deleted!');

        return redirect('admin/places');
    }
}

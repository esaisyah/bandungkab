<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\District;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class DistrictsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $districts = District::paginate(15);

        return view('backend.districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('backend.districts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nama' => 'required', 'alamat' => 'required', 'telepon' => 'required', 'camat' => 'required', ]);

        District::create($request->all());

        Session::flash('flash_message', 'District added!');

        return redirect('admin/districts');
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
        $district = District::findOrFail($id);

        return view('backend.districts.show', compact('district'));
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
        $district = District::findOrFail($id);

        return view('backend.districts.edit', compact('district'));
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
        $this->validate($request, ['nama' => 'required', 'alamat' => 'required', 'telepon' => 'erquired', 'camat' => 'required', ]);

        $district = District::findOrFail($id);
        $district->update($request->all());

        Session::flash('flash_message', 'District updated!');

        return redirect('admin/districts');
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
        District::destroy($id);

        Session::flash('flash_message', 'District deleted!');

        return redirect('admin/districts');
    }
}

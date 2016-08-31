<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Complaint;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $complaints = Complaint::paginate(15);

        return view('backend.complaints.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('backend.complaints.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nama' => 'required', 'email' => 'required', 'kategori' => 'required', 'pesan' => 'required', ]);

        Complaint::create($request->all());

        Session::flash('flash_message', 'Complaint added!');

        return redirect('admin/complaints');
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
        $complaint = Complaint::findOrFail($id);

        return view('backend.complaints.show', compact('complaint'));
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
        $complaint = Complaint::findOrFail($id);

        return view('backend.complaints.edit', compact('complaint'));
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
        $this->validate($request, ['nama' => 'required', 'email' => 'required', 'kategori' => 'required', 'pesan' => 'required', ]);

        $complaint = Complaint::findOrFail($id);
        $complaint->update($request->all());

        Session::flash('flash_message', 'Complaint updated!');

        return redirect('admin/complaints');
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
        Complaint::destroy($id);

        Session::flash('flash_message', 'Complaint deleted!');

        return redirect('admin/complaints');
    }
}

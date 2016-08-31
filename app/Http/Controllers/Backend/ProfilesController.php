<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Profile;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $profiles = Profile::paginate(15);

        return view('backend.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('backend.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nama' => 'required', 'email' => '', 'jabatan' => 'required', ]);

        Profile::create($request->all());

        Session::flash('flash_message', 'Profile added!');

        return redirect('admin/profiles');
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
        $profile = Profile::findOrFail($id);

        return view('backend.profiles.show', compact('profile'));
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
        $profile = Profile::findOrFail($id);

        return view('backend.profiles.edit', compact('profile'));
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
        $this->validate($request, ['nama' => 'required', 'email' => '', 'jabatan' => 'required', ]);

        $profile = Profile::findOrFail($id);
        $profile->update($request->all());

        Session::flash('flash_message', 'Profile updated!');

        return redirect('admin/profiles');
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
        Profile::destroy($id);

        Session::flash('flash_message', 'Profile deleted!');

        return redirect('admin/profiles');
    }
}

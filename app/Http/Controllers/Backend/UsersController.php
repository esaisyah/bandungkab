<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $users = User::where('role_id', '<>', 'murid')->get();

        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'required|unique:users,email', 'password' => 'required', 'role_id' => 'required']);

        $user = User::create($request->all());
        $user->password = bcrypt($request->input('password'));
        $user->save();

        Session::flash('flash_message', 'User berhasil dibuat!');

        return redirect('admin/users');
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
        $user = User::findOrFail($id);

        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return
     */
    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);

        $this->validate($request, ['name' => 'required', 'email' => "required|unique:users,email,$user->email,email", 'password' => 'min:6', 'role_id' => 'required']);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');
        if(! empty($request->input('password'))){
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        Session::flash('flash_message', 'Data user berhasil diperbaharui!');

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return
     */
    public function destroy($id)
    {
        User::destroy($id);

        Session::flash('flash_message', 'User berhasil dihapus!');

        return redirect('admin/users');
    }
}

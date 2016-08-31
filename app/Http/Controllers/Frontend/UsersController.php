<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Hash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

class UsersController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('frontend.users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'password_lama' => 'required',
            'password' => 'required|alpha_num|min:6|confirmed',
            'password_confirmation' => 'required|alpha_num|min:6',
        ]);

        if(Hash::check( $request->input('password_lama'), Auth::user()->password )){
            Auth::user()->password = bcrypt($request->input('password'));
            Auth::user()->save();

            Session::flash('flash_message', 'Password berhasil diubah!');
            return redirect()->back();
        }

        Session::flash('danger', 'Password lama anda salah');
        return redirect()->back();
    }

    public function show()
    {
        $user = Auth::user();

        return view('frontend.users.show', compact('user'));
    }
}

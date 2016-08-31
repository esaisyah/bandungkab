<?php

namespace App\Http\Controllers\Frontend;

use App\Profile;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfilesController extends Controller
{
    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return view('frontend.profiles.show', compact('profile'));
    }
}

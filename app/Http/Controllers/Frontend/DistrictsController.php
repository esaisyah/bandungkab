<?php

namespace App\Http\Controllers\Frontend;

use App\District;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DistrictsController extends Controller
{
    public function index()
    {
        $districts = District::orderBy('nama', 'asc')->get();
        return view('frontend.districts.index', compact('districts'));
    }
}

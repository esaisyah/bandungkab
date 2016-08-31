<?php

namespace App\Http\Controllers\Frontend;

use App\Unit;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UnitsController extends Controller
{
    public function index()
    {
        $units = Unit::orderBy('nama', 'asc')->get();
        return view('frontend.units.index', compact('units'));
    }
}

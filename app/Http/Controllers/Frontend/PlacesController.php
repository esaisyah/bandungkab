<?php

namespace App\Http\Controllers\Frontend;

use App\Place;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlacesController extends Controller
{
    public function index()
    {
        $places = Place::orderBy('nama')->paginate(8);
        return view('frontend.places.index', compact('places'));
    }

    public function show($id)
    {
        $place = Place::findOrFail($id);
        return view('frontend.places.show', compact('place'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Page;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class PagesController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return
     */
    public function show($id)
    {
        $page = Page::findOrFail($id);
        return view('frontend.pages.show', compact('page'));
    }

    public function pageContact()
    {
        $page = Page::findOrFail(13);
        return view('frontend.pages.contact', compact('page'));
    }
}

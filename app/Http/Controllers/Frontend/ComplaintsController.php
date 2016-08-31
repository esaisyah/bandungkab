<?php

namespace App\Http\Controllers\Frontend;

use App\Complaint;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

class ComplaintsController extends Controller
{
    public function keluhan()
    {
        $complaints = Complaint::where('kategori', 'keluhan')->orderBy('id', 'desc')->paginate(10);
        return view('frontend.complaints.keluhan', compact('complaints'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['nama' => 'required', 'email' => 'required', 'kategori' => 'required', 'pesan' => 'required', ]);

        Complaint::create($request->all());

        Session::flash('flash_message', 'Terimakasih, suara anda telah hasil dikirim.');

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MenuItem;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class MenuItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $menuitems = MenuItem::where('menu_id', '<>', 'menu_superadmin')->get();

        return view('backend.menuitems.index', compact('menuitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('backend.menuitems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nama' => 'required', 'url' => 'required', 'menu_id' => 'required', ]);

        MenuItem::create($request->all());

        Session::flash('flash_message', 'MenuItem added!');

        return redirect('admin/menu-items');
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
        $menuitem = MenuItem::findOrFail($id);

        return view('backend.menuitems.show', compact('menuitem'));
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
        $menuitem = MenuItem::findOrFail($id);

        return view('backend.menuitems.edit', compact('menuitem'));
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
        $this->validate($request, ['nama' => 'required', 'url' => 'required', 'menu_id' => 'required', ]);

        $menuitem = MenuItem::findOrFail($id);
        $menuitem->update($request->all());

        Session::flash('flash_message', 'MenuItem updated!');

        return redirect('admin/menu-items');
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
        MenuItem::destroy($id);

        Session::flash('flash_message', 'MenuItem deleted!');

        return redirect('admin/menu-items');
    }
}

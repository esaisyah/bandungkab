<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BudgetReport;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class BudgetReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $budgetreports = BudgetReport::paginate(15);

        return view('backend.budgetreports.index', compact('budgetreports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('backend.budgetreports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', ]);

        BudgetReport::create($request->all());

        Session::flash('flash_message', 'BudgetReport added!');

        return redirect('admin/budget-reports');
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
        $budgetreport = BudgetReport::findOrFail($id);

        return view('backend.budgetreports.show', compact('budgetreport'));
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
        $budgetreport = BudgetReport::findOrFail($id);

        return view('backend.budgetreports.edit', compact('budgetreport'));
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
        $this->validate($request, ['name' => 'required', ]);

        $budgetreport = BudgetReport::findOrFail($id);
        $budgetreport->update($request->all());

        Session::flash('flash_message', 'BudgetReport updated!');

        return redirect('admin/budget-reports');
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
        BudgetReport::destroy($id);

        Session::flash('flash_message', 'BudgetReport deleted!');

        return redirect('admin/budget-reports');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\BudgetReport;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BudgetReportsController extends Controller
{
    public function index()
    {
        $reports = BudgetReport::orderBy('id', 'desc')->paginate(5);
        return view('frontend.budgetreports.index', compact('reports'));
    }
}

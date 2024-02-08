<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use View;

class BranchController extends Controller
{
    public function index() {
        $branch = DB::table('branch')
            ->join('employee', 'employee.id', '=', 'branch.branch_head')
            ->select('branch.id', 'branch.location', 'employee.fname', 'employee.lname', 'employee.position')
            ->get();
        // dd($products);
        return View::make('branches.index', compact('branch'));
    }
}

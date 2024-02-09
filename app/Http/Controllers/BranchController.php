<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use View;
use Redirect;

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

    public function create() {
        $head = Employee::all();
        return View::make('branches.create', compact('head'));
    }

    public function store(Request $request)
    {
        $branch = new Branch();
        $branch->location = $request->location;
        $branch->branch_head = $request->head;
        $branch->save();

        return Redirect::to('branch');
    }
}

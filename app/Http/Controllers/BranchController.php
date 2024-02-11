<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Http\Requests\StoreBranchRequest;
use View;
use Redirect;

class BranchController extends Controller
{
    public function index() {
        $branch = DB::table('branch')
            ->join('employee', 'employee.id', '=', 'branch.branch_head')
            ->select('branch.id', 'branch.location', 'employee.fname', 'employee.lname', 'employee.position', 'branch.img_path')
            ->get();
        // dd($products);
        return View::make('branches.index', compact('branch'));
    }

    public function create() {
        $head = Employee::all();
        return View::make('branches.create', compact('head'));
    }

    public function store(StoreBranchRequest $request)
    {
        $data = $request->validated();

        $branch = new Branch();
        $branch->location = $data['location'];
        $branch->branch_head = $data['head'];

        if($request->has('image')) {
            $temp = request()->file('image')->store('branch', 'public');
            $branch->img_path = $temp;
        }

        $branch->save();

        return Redirect::to('branch');
    }

    public function edit($id)
    {
        $branch = Branch::find($id);
        $head = Employee::where('id', $branch->branch_head)->first();
        $employeeList = Employee::all();

        return View::make('branches.edit', compact('branch', 'head', 'employeeList'));
    }


    public function update(Request $request, $id)
    {
        $location = $request->location;
        $head = $request->head;

        $branch = Branch::find($id);
        $branch->location = $location;
        $branch->branch_head = $head;

        $branch->save();
        return Redirect::to('branch');
    }

    public function delete($id) 
    {
        Branch::destroy($id);
        return Redirect::to('branch');
    }
}

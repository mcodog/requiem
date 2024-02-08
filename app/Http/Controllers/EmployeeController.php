<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\EmployeeStatus;
use App\Models\EmployeeClass;
use Redirect;

use Illuminate\Http\Request;
use View;

class EmployeeController extends Controller
{
    public function index() {
        $employees = DB::table('employee')
            ->join('employee_class', 'employee_class.id', '=', 'employee.class_id')
            ->join('employee_status', 'employee_status.id', '=', 'employee.status_id')
            ->select('employee.id', 'employee.lname', 'employee.fname', 'employee_status.description as status', 'employee_class.description as class', 'employee.position')
            ->get();
        // dd($products);
        return View::make('employees.index', compact('employees'));
    }

    public function create() {
        $class = EmployeeClass::all();
        $status = EmployeeStatus::all();
        return View::make('employees.create', compact('class', 'status'));
    }

    public function store(Request $request)
    {
        $lname = $request->lname;
        $fname = $request->fname;
        $age = $request->age;
        $address = $request->address;
        $position = $request->empPosition;
        $empClass = $request->empClass;
        $empStatus = $request->empStatus;
        $employee = new Employee();
        $employee->lname = $lname;
        $employee->fname = $fname;
        $employee->age = $age;
        $employee->address = $address;
        $employee->position = $position;
        $employee->class_id = $empClass;
        $employee->status_id = $empStatus;
        
        $employee->save();
        return Redirect::to('employees');
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $class = EmployeeClass::where('id', $employee->class_id)->first();
        $status = EmployeeStatus::where('id', $employee->status_id)->first();
        $classAll = EmployeeClass::all();
        $statusAll = EmployeeStatus::all();
        return View::make('employees.edit', compact('employee', 'class', 'status', 'classAll', 'statusAll'));
    }

    public function update(Request $request, $id)
    {
        // dump($request->lname);
        // dump($request->fname);
        // dump($request->age);
        // dump($request->address);
        // dump($request->empClass);
        // dump($request->empStatus);
        // dump($request->empPosition);
        $employee = Employee::find($id);
        $employee->lname = $request->lname;
        $employee->fname = $request->fname;
        $employee->age = $request->age;
        $employee->address = $request->address;
        $employee->class_id = $request->empClass;
        $employee->status_id = $request->empStatus;
        $employee->position = $request->empPosition;

        $employee->save();
        return Redirect::to('employees');
    }

    public function delete($id)
    {
        Employee::destroy($id);
        return Redirect::to('employees');
    }
}

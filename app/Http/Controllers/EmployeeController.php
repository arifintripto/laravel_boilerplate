<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        $departments = Department::all();

        return view('dashboard.pages.employee.index', compact('employees', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $departments = Department::all();

        return view('dashboard.pages.employee.create', compact('employees', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Employee::create(\request()->validate([
            'name' => 'required|max:50|string',
            'type' => 'required|integer',
            'department_id' => 'required|integer',
            'mobile' => 'required|string|unique:employees|min:11',
            'alt_mobile' => '',
            'email' => 'email|unique:employees',
            'nid' => 'required|integer|unique:employees',
            'joining_date' => 'required',

        ]));
        return redirect(route('employee.index'))->with('message', 'New Employee Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('dashboard.pages.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        return view('dashboard.pages.employee.edit', compact('employee', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        \request()->validate([
            'name' => 'required|max:100|string',
            'type' => 'required|integer',
            'department_id' => 'required|integer',
            'mobile' => 'required|string|min:11',
            'alt_mobile' => '',
            'email' => 'email',
            'nid' => 'required|integer',
            'joining_date' => 'required',
        ]);

        $employee->name = \request('name');
        $employee->type = \request('type');
        $employee->department_id = \request('department_id');
        $employee->mobile = \request('mobile');
        $employee->alt_mobile = \request('alt_mobile');
        $employee->email = \request('email');
        $employee->nid = \request('nid');
        $employee->joining_date = \request('joining_date');
        $employee->save();

        return redirect(route('employee.edit', $employee))->with('message', 'Employee Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->is_active = 0;
        $employee->save();

        return redirect('employee')->with('deletedEmployeeMsg', 'Employee Deleted Successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $departments = Department::all();
        $departments = Department::where('is_active','=',1)->get();
        return view('dashboard.pages.department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        return view('dashboard.pages.department.index');
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Department::create(\request()->validate([
            'name' => 'required|max:100|string',
        ]));
        return redirect(route('department.index'))->with('message', 'New Department Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('dashboard.pages.department.show', compact('department'));
    }

    /**
     *
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('dashboard.pages.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function update(Department $department)
    {
        \request()->validate([
            'name' => 'required|unique:departments|max:100|string',
        ]);

        $department->name = \request('name');
        $department->save();

        return redirect(route('department.edit', $department))->with('message', 'Department Name Changed!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->is_active = 0;
        $department->save();
//        $department->delete();

        return redirect('department')->with('deletedDepartmentMsg', 'Department Deleted Successfully!');
    }
}

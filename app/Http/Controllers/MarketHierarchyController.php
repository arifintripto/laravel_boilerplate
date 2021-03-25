<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\MarketHierarchy;
use Illuminate\Http\Request;

class MarketHierarchyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marketHierarchies = MarketHierarchy::all();
        $employees = Employee::all();

        return view('dashboard.pages.markethierarchy.index', compact('marketHierarchies', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marketHierarchy = MarketHierarchy::all();
        $employees = Employee::all();

        return view('dashboard.pages.markethierarchy.create', compact('marketHierarchy', 'employees'));
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
            'code' => 'required|max:50|string',
            'parent_code' => 'required|integer',
            'ff_code' => 'required|integer',
            'parent_ff_code' => 'required|string|unique:market_hierarchies|min:11',
            'area' => '',
            'level' => 'integer|unique:market_hierarchies'
        ]));
        return redirect(route('markethierarchy.index'))->with('message', 'New Hierarchy Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MarketHierarchy  $marketHierarchy
     * @return \Illuminate\Http\Response
     */
    public function show(MarketHierarchy $marketHierarchy)
    {
        return view('dashboard.pages.markethierarchy.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarketHierarchy  $marketHierarchy
     * @return \Illuminate\Http\Response
     */
    public function edit(MarketHierarchy $marketHierarchy)
    {
        $employees = Employee::all();
        return view('dashboard.pages.markethierarchy.edit', compact('marketHierarchy', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MarketHierarchy  $marketHierarchy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarketHierarchy $marketHierarchy)
    {
        \request()->validate([
            'code' => 'required|max:50|string',
            'parent_code' => 'required|integer',
            'ff_code' => 'required|integer',
            'parent_ff_code' => 'required|string|unique:market_hierarchies|min:11',
            'area' => '',
            'level' => 'unique:market_hierarchies',
        ]);

        $marketHierarchy->code = \request('code');
        $marketHierarchy->parent_code = \request('parent_code');
        $marketHierarchy->ff_code = \request('ff_code');
        $marketHierarchy->parent_ff_code = \request('parent_ff_code');
        $marketHierarchy->area = \request('area');
        $marketHierarchy->level = \request('level');
        $marketHierarchy->save();

        return redirect(route('markethierarchy.edit', $marketHierarchy))->with('message', 'Hierarchy Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarketHierarchy  $marketHierarchy
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarketHierarchy $marketHierarchy)
    {
        $marketHierarchy->is_active = 0;
        $marketHierarchy->save();

        return redirect('markethierarchy')->with('deletedMarketHierarchy', 'Hierarchy Deleted Successfully!');
    }
}

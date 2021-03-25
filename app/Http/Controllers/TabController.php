<?php

namespace App\Http\Controllers;

use App\Models\Alltabs;
use App\Models\Tab;
use Illuminate\Http\Request;

class TabController extends Controller
{
    public function alltabsToTab() {
        $alltabs = Alltabs::all();

        foreach ($alltabs as $alltab) {
            $tab = new Tab();

            $tab->create([
                'tab_model' => $alltab->tab_model,
                'tab_name' => $alltab->tab_name,
                'tab_serial' => $alltab->tab_serial,
                'tab_imei' => $alltab->tab_imei,
                'sim_no' => $alltab->sim_no,
                'sim_serial_no' => $alltab->sim_serial_no,
                'pin1' => $alltab->pin1,
                'pin2' => $alltab->pin2,
                'puk1' => $alltab->puk1,
                'puk2' => $alltab->puk2,
                'spo_code' => $alltab->spo_code,
            ]);
        }

        return redirect('upload_tab_csv')->with('feedtabsdata_msg', 'Success!');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tab  $tab
     * @return \Illuminate\Http\Response
     */
    public function show(Tab $tab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tab  $tab
     * @return \Illuminate\Http\Response
     */
    public function edit(Tab $tab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tab  $tab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tab $tab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tab  $tab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tab $tab)
    {
        //
    }
}

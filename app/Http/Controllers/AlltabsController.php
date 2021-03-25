<?php

namespace App\Http\Controllers;

use App\Models\Alltabs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AlltabsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabs = Alltabs::all();
        return view('dashboard.pages.all_tabs.index', compact('tabs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.upload_tab_csv.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv'
        ]);

        $file = file($request->file->getRealPath());
        $data = array_slice($file, 3);

        $parts = (array_chunk($data, 50));

        if (!File::isDirectory(base_path().'/resources/csv/tab_csv')){
            $create_csv_folder = File::makeDirectory(base_path().'/resources/csv');
            $create_tab_csv_folder = File::makeDirectory(base_path().'/resources/csv/tab_csv');
        }

        foreach ($parts as $index=>$part){
            $fileName = resource_path('csv/tab_csv/'.date('y-m-d-').$index.'.csv');
            file_put_contents($fileName, $part);
        }

        //IMPRTING TO DATABASE START
        //IMPRTING TO DATABASE START
        $tabs_path = resource_path('csv/tab_csv/*.csv');
        $tabs_g = glob($tabs_path);

        foreach (array_slice($tabs_g, 0) as $tabs_file) {
            $tabs_data = array_map('str_getcsv', file($tabs_file));

            foreach ($tabs_data as $tabs_row) {

                Alltabs::create([
                    'rsm_area' => $tabs_row[0],
                    'rsm_code' => $tabs_row[1],
                    'rsm_name' => $tabs_row[2],
                    'rsm_mobile' => $tabs_row[3],
                    'asm_area' => $tabs_row[4],
                    'asm_code' => $tabs_row[5],
                    'asm_name' => $tabs_row[6],
                    'asm_mobile' => $tabs_row[7],
                    'tt' => $tabs_row[8],
                    'tso_code' => $tabs_row[9],
                    'tso_name' => $tabs_row[10],
                    'tso_mobile' => $tabs_row[11],
                    'tso_alt_mobile' => $tabs_row[12],
                    'sdb_cd_code' => $tabs_row[13],
                    'sdb_cd_name' => $tabs_row[14],
                    'db_code' => $tabs_row[15],
                    'db_name' => $tabs_row[16],
                    'db_type' => $tabs_row[17],
                    'ship_to_party_name' => $tabs_row[18],
                    'tab_model' => $tabs_row[19],
                    'tab_name' => $tabs_row[20],
                    'tab_serial' => $tabs_row[21],
                    'tab_imei' => $tabs_row[22],
                    'sim_no' => $tabs_row[23],
                    'sim_serial_no' => $tabs_row[24],
                    'pin1' => $tabs_row[25],
                    'pin2' => $tabs_row[26],
                    'puk1' => $tabs_row[27],
                    'puk2' => $tabs_row[28],
                    'spo_route' => $tabs_row[29],
                    'spo_code' => $tabs_row[30],
                    'spo_name' => $tabs_row[31],
                    'spo_nid_no' => $tabs_row[32],
                    'spo_type' => $tabs_row[33],
                    'spo_mobile' => $tabs_row[34],
                    'spo_alt_mobile' => $tabs_row[35],
                    'power_bank_serial_no' => $tabs_row[36],
                    'status' => $tabs_row[37],
                    'knox_status' => $tabs_row[38],
                ]);
            }

            $delete_tabs_file = File::delete($tabs_file);
        }
        $delete_tabs_folder = File::deleteDirectory(base_path().'/resources/csv/tab_csv');
        $delete_csv_folder = File::deleteDirectory(base_path().'/resources/csv');

        //IMPRTING TO DATABASE END
        //IMPRTING TO DATABASE END


        return redirect('upload_tab_csv')->with('message', 'Uploaded CSV to Database Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alltabs  $alltabs
     * @return \Illuminate\Http\Response
     */
    public function show(Alltabs $alltabs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alltabs  $alltabs
     * @return \Illuminate\Http\Response
     */
    public function edit(Alltabs $alltabs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alltabs  $alltabs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alltabs $alltabs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alltabs  $alltabs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alltabs $alltabs)
    {
        //
    }
}

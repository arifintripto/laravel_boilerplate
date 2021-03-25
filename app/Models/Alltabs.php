<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Alltabs extends Model
{
    use HasFactory;

    protected $guarded = [];

//    public function importTabsToDb()
//    {
//
//        $tabs_path = resource_path('csv/tab_csv/*.csv');
//
//        $tabs_g = glob($tabs_path);
//
//        foreach (array_slice($tabs_g, 0) as $tabs_file) {
//            $tabs_data = array_map('str_getcsv', file($tabs_file));
//
//            foreach ($tabs_data as $tabs_row) {
//
//                self::updateOrCreate([
//                    'rsm_area' => $tabs_row[0],
//                    'rsm_code' => $tabs_row[1],
//                    'rsm_name' => $tabs_row[2],
//                    'rsm_mobile' => $tabs_row[3],
//                    'asm_area' => $tabs_row[4],
//                    'asm_code' => $tabs_row[5],
//                    'asm_name' => $tabs_row[6],
//                    'asm_mobile' => $tabs_row[7],
//                    'tt' => $tabs_row[8],
//                    'tso_code' => $tabs_row[9],
//                    'tso_name' => $tabs_row[10],
//                    'tso_mobile' => $tabs_row[11],
//                    'tso_alt_mobile' => $tabs_row[12],
//                    'sdb_cd_code' => $tabs_row[13],
//                    'sdb_cd_name' => $tabs_row[14],
//                    'db_code' => $tabs_row[15],
//                    'db_name' => $tabs_row[16],
//                    'db_type' => $tabs_row[17],
//                    'ship_to_party_name' => $tabs_row[18],
//                    'tab_model' => $tabs_row[19],
//                    'tab_name' => $tabs_row[20],
//                    'tab_serial' => $tabs_row[21],
//                    'tab_imei' => $tabs_row[22],
//                    'sim_no' => $tabs_row[23],
//                    'sim_serial_no' => $tabs_row[24],
//                    'pin1' => $tabs_row[25],
//                    'pin2' => $tabs_row[26],
//                    'puk1' => $tabs_row[27],
//                    'puk2' => $tabs_row[28],
//                    'spo_route' => $tabs_row[29],
//                    'spo_code' => $tabs_row[30],
//                    'spo_name' => $tabs_row[31],
//                    'spo_nid_no' => $tabs_row[32],
//                    'spo_type' => $tabs_row[33],
//                    'spo_mobile' => $tabs_row[34],
//                    'spo_alt_mobile' => $tabs_row[35],
//                    'power_bank_serial_no' => $tabs_row[36],
//                    'status' => $tabs_row[37],
//                    'knox_status' => $tabs_row[38],
//                ]);
//            }
//            $delete_tabs_file = File::delete($tabs_file);
//        }
//        $delete_tab_csv_folder = File::deleteDirectory(base_path().'/resources/csv/tab_csv');
//        $delete_csv_folder = File::deleteDirectory(base_path().'/resources/csv');
//
//    }
}

<?php

use App\Models\Department;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlltabsController;
use App\Http\Controllers\TabController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MarketHierarchyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard.pages.dashboard.index');
});

//Route::get('upload_tab_csv', [AlltabsController::class ,'create']);
//Route::post('upload_tab_csv', [AlltabsController::class ,'store']);
//Route::resource('department', DepartmentController::class);
//Route::resource('employee', EmployeeController::class);



//Route::get('/test',function(){
//    $create_csv_folder = File::makeDirectory(base_path().'/resources/csv');
//    $create_tab_csv_folder = File::makeDirectory(base_path().'/resources/csv/tab_csv');
//    $result = File::isDirectory(base_path().'/resources/csv/tab_csv');
    // return true if folder created
//});

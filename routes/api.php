<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'cors'], function() {
    Route::middleware('apimid:admin_finance,admin_muhafidz_muhafidzah,admin_musyrif_musyrifah,admin_discipline')->post('list-student', 'Api\StudentController@list');
    Route::middleware('apimid:admin_finance,admin_muhafidz_muhafidzah,muhafidz_muhafidzah')->post('list-student-by-recitation-group', 'Api\StudentController@listByRecitationGroup');
    Route::middleware('apimid:admin_muhafidz_muhafidzah')->post('search-student-by-name-not-in-recitation-group', 'Api\StudentController@searchByNameNotInRecitationGroup');
    Route::middleware('apimid:admin_finance,admin_muhafidz_muhafidzah')->post('show-student', 'Api\StudentController@show');
    Route::middleware('apimid:cashier_wibsmart,admin_discipline,security')->post('show-student-by-rfid', 'Api\StudentController@showByRFID');
});


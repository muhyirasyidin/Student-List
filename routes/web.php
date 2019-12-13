<?php

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    
    Route::group(['prefix' => 'profile'], function() {
        Route::get('', 'HomeController@profile');
    });

    Route::group(['prefix' => 'student'], function() {
        Route::get('', 'StudentController@index');
        Route::get('form/{action}/{id?}', 'StudentController@form');
        Route::post('data', 'StudentController@store');
        Route::put('{id}', 'StudentController@update');
        Route::delete('{id}', 'StudentController@destroy');
        Route::get('excel', 'StudentController@exportExcel');
    });

    Route::group(['prefix' => 'student-class'], function() {
        Route::get('', 'ClassesController@index');
        Route::get('form/{action}/{id?}', 'ClassesController@form');
        Route::post('data', 'ClassesController@store');
        Route::put('{id}', 'ClassesController@update');
        Route::delete('{id}', 'ClassesController@destroy');
    });

    Route::group(['prefix' => 'dormitory'], function() {
        Route::get('', 'DormController@index');
        Route::get('form/{action}/{id?}', 'DormController@form');
        Route::post('data', 'DormController@store');
        Route::put('{id}', 'DormController@update');
        Route::delete('{id}', 'DormController@destroy');
    });

    Route::group(['prefix' => 'datatable'], function(){
        Route::get('student', 'DatatableController@student');
        Route::get('student-class', 'DatatableController@class');
        Route::get('dormitory', 'DatatableController@dorm');
    });

});  

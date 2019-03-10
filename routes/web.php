<?php

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
    return view('welcome');
});

Route::post('inscripcion', 'InscripcionController@registrarse')->name('inscripcion');
Route::get('reporte', 'InscripcionController@inscripciones')->name('reporte');
Route::get('download/{file}' , 'InscripcionController@downloadFile');
Route::get('formato' , 'InscripcionController@descargarFormato');
Route::get('reglamento' , 'InscripcionController@descargarReglamento');

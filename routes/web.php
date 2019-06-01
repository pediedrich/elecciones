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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/mesas/votos/cargar/certificado/','TableController@ajaxLoadCertificate');

Route::resource('/mesas','TableController');

Route::get('/mesas/votos/cargar',[
  'uses' => 'TableController@loadVotes',
  'as' => 'loadVotes'
]);

Route::post('/mesas/votos/guardar',[
  'uses' => 'ResultController@saveVotes',
  'as' => 'saveVotes'
]);

Route::resource('/circuitos','CircuitController');
Route::resource('/escuelas','SchoolController');
Route::resource('/lemas','LemaController');
Route::resource('/sublemas','SublemaController');
Route::resource('/cargos','ChargeController');
Route::resource('/municipios','MunicipalityController');

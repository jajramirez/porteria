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

Route::resource('/soap','SoapController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

	Route::post('/correo/enviocorreo', [
		'as' => 'correo.enviocorreo', 
		'uses' => 'CorreoController@enviocorreo'
		]);

Route::resource('/division','DivisionController');
		Route::post('division/datos', [
				'uses' => 'DivisionController@datos',
				'as' =>  'division.datos'
			]);
		Route::get('division/{id}/destroy', [
				'uses' => 'DivisionController@destroy',
				'as' =>  'division.destroy'
			]);

Route::resource('/entidad','EntidadController');
		Route::get('entidad/{id}/destroy', [
				'uses' => 'EntidadController@destroy',
				'as' =>  'entidad.destroy'
			]);
Route::resource('/vinculacion','VinculacionController');
		Route::get('vinculacion/{id}/destroy', [
				'uses' => 'VinculacionController@destroy',
				'as' =>  'vinculacion.destroy'
			]);

Route::resource('/tipounidad','TipoUnidadController');
		Route::get('tipounidad/{id}/destroy', [
				'uses' => 'TipoUnidadController@destroy',
				'as' =>  'tipounidad.destroy'
			]);
Route::resource('/estado','EstadoController');
		Route::get('estado/{id}/destroy', [
				'uses' => 'EstadoController@destroy',
				'as' =>  'estado.destroy'
			]);
Route::resource('/unidad','UnidadController');
		Route::get('unidad/{id}/destroy', [
				'uses' => 'UnidadController@destroy',
				'as' =>  'unidad.destroy'
			]);
Route::resource('/usuario','UsuarioController');
		Route::get('usuario/{id}/destroy', [
				'uses' => 'UsuarioController@destroy',
				'as' =>  'usuario.destroy'
			]);

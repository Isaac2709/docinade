<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin'], 'namespace' => 'Administrador'], function(){
	Route::resource('/', 'AdministradorController');
});


Route::group(['prefix' => 'formulario', 'middleware' => ['auth', 'is_aspirant'], 'namespace' => 'Formulario'], function(){
	// Route::controller('/', 'FormularioController');
	Route::post('expInvestigacion', 'ExperienciaInvestigacionController@store');
	Route::post('eduSuperior', 'EducacionSuperiorController@store');
	Route::post('expProfesional', 'ExperienciaProfesionalController@store');
	Route::post('invPublicada', 'PublicacionController@store');
	Route::post('curRelevante', 'CursoSeminarioController@store');
	Route::post('conIdioma', 'ConocimientoIdiomaController@store');
	Route::post('accBlibliotecaProcDatos', 'BibliotecaProcesamientoDatosController@store');
	Route::post('accProgramasComputo', 'ProgramaComputacionController@store');
	Route::post('proTesis', 'PropuestaTesisController@store');
	Route::post('recomendacion', 'RecomendacionController@store');
	Route::get('/', 'FormularioController@getIndex');
	Route::post('/', 'FormularioController@postIndex');
	Route::get('pdfformulario', 'FormularioController@getPdfformulario');
});

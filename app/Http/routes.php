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

Route::get('pdf', function(){
    $fpdf = new Fpdf();
    $fpdf->AddPage();
    $fpdf->SetFont('Arial','B',16);
    $fpdf->Cell(40,20,'Hello World!');
    $fpdf->Cell(40,20,'Hola Mundo!');
    $fpdf->Output();
    exit;

});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin'], 'namespace' => 'Administrador'], function(){
	Route::resource('admins', 'AdministradorController');
	Route::resource('profesores', 'ProfesorController');
	Route::get('/', 'AdministradorController@forms');
	Route::get('aspirantFormData', 'AdministradorController@aspirantFormData');
	Route::get('aspirante/{Asp_ID}', 'AspiranteController@index');
});

Route::group(['prefix' => 'profesor', 'middleware' => ['auth', 'is_professor'], 'namespace' => 'Profesor'], function(){
	Route::get('/', 'ProfesorController@forms');
	// Route::get('perfil/{Prof_ID}', 'ProfesorController@show');
	// Route::post('perfil/{Prof_ID}', 'ProfesorController@update');
	Route::resource('perfil', 'ProfesorController');
	Route::get('aspirante/{Asp_ID}', 'AspiranteController@index');
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
	Route::get('docformulario', 'FormularioController@getDocFormulario');
	Route::post('envFormulario', 'FormularioController@postEnviarFormulario');
});

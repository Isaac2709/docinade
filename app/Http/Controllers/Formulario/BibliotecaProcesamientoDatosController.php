<?php namespace App\Http\Controllers\Formulario;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\AccesoBiblioteca;
use App\AccesoProcesamientoDatos;
use App\Http\Requests\CrearBibliotecaProcesamientoDatosRequest;

use Illuminate\Http\Request;

class BibliotecaProcesamientoDatosController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearBibliotecaProcesamientoDatosRequest $request)
	{
		$user = User::find(Auth::user()->Usu_ID);

		$accesos_bibliotecas_a_eliminar = $user->formulario->informacion_aspirante->seleccionarAccesoBibliotecaAEliminar($request->biblioteca);
		foreach ($accesos_bibliotecas_a_eliminar as $acceso_biblioteca) {
			$acceso_biblioteca->delete();
		}

		$accesos_procesamientos_datos_a_eliminar = $user->formulario->informacion_aspirante->seleccionarAccesoProcesamientoDatosAEliminar($request->procesamiento_datos);
		foreach ($accesos_procesamientos_datos_a_eliminar as $acceso_procesamiento_datos) {
			$acceso_procesamiento_datos->delete();
		}

		// For each para recorrer todos las bibliotecas a las que el aspirante tiene acceso.
		foreach ($request->biblioteca as $biblioteca) {
			if(!empty($biblioteca)){
				$acceso_biblioteca = null;
				$acceso_biblioteca = $user->formulario->informacion_aspirante->acceso_bibliotecas()->where('Bib_Nombre', '=', trim($biblioteca, " \t."))->first();

				if(is_null($acceso_biblioteca)){
					$acceso_biblioteca = new AccesoBiblioteca();
					$acceso_biblioteca->Bib_Nombre = $biblioteca;

					$user->formulario->informacion_aspirante->acceso_bibliotecas()->save($acceso_biblioteca);
				}
			}
		}

		// For each para recorrer todos los procesamientos de datos al que el usuario tiene acceso
		foreach ($request->procesamiento_datos as $procesamiento_datos) {
			if(!empty($procesamiento_datos)){
				$acceso_procesamiento_datos = null;
				$acceso_procesamiento_datos = $user->formulario->informacion_aspirante->acceso_procesamiento_datos()->where('PDa_Nombre', '=', $procesamiento_datos)->first();

				if(is_null($acceso_procesamiento_datos)){
					$acceso_procesamiento_datos = new AccesoProcesamientoDatos();
					$acceso_procesamiento_datos->PDa_Nombre = $procesamiento_datos;

					$user->formulario->informacion_aspirante->acceso_procesamiento_datos()->save($acceso_procesamiento_datos);
				}
			}
		}
		if($user->formulario->formularioEstaLLeno() === true){
			return redirect()->back()->withInput()->with('successMessage', trans('alert.alert_form.completed'));
		}
		return redirect()->back()->withInput()->with('successMessage', trans('alert.alert_form.updated'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

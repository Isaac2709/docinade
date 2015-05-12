<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\AccesoProgramaComputacion;

use Illuminate\Http\Request;

class ProgramaComputacionController extends Controller {

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
	public function store(Request $request)
	{
		$user = User::find(Auth::user()->Usu_ID);

		$accesos_programas_computacion_a_eliminar = $user->formulario->informacion_aspirante->seleccionarAccesoBibliotecaAEliminar($request->programa_computacion);
		foreach ($accesos_programas_computacion_a_eliminar as $acceso_programa_computacion) {
			$acceso_programa_computacion->delete();
		}

		// For each para recorrer todos las bibliotecas a las que el aspirante tiene acceso.
		foreach ($request->programa_computacion as $programa_computacion) {
			if(!empty($programa_computacion)){
				$acceso_programa_computacion = null;
				$acceso_programa_computacion = $user->formulario->informacion_aspirante->acceso_programas_computacionales()->where('Prog_Nombre', '=', trim($programa_computacion, " \t."))->first();

				if(is_null($acceso_programa_computacion)){
					$acceso_programa_computacion = new AccesoProgramaComputacion();
					$acceso_programa_computacion->Prog_Nombre = $programa_computacion;

					$user->formulario->informacion_aspirante->acceso_programas_computacionales()->save($acceso_programa_computacion);
				}
			}
		}

		$message = 'Sus datos han sido actualizados.';
		return redirect()->back()->withInput()->with('successMessage', [$message]);
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

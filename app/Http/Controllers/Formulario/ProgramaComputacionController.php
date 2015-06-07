<?php namespace App\Http\Controllers\Formulario;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\AccesoProgramaComputacion;
use App\EducacionDistancia;

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

		$accesos_programas_computacion_a_eliminar = $user->formulario->informacion_aspirante->seleccionarAccesoProgramaComputacionAEliminar($request->programa);
		foreach ($accesos_programas_computacion_a_eliminar as $acceso_programa_computacion) {
			$acceso_programa_computacion->delete();
		}

		// For each para recorrer todos las bibliotecas a las que el aspirante tiene acceso.
		foreach ($request->programa as $programa_computacional) {
			if(!empty($programa_computacional)){
				$acceso_programa_computacion = null;
				$acceso_programa_computacion = $user->formulario->informacion_aspirante->acceso_programas_computacionales()->where('Prog_Nombre', '=', $programa_computacional)->first();

				if(is_null($acceso_programa_computacion)){
					$acceso_programa_computacion = new AccesoProgramaComputacion();
					$acceso_programa_computacion->Prog_Nombre = $programa_computacional;

					$user->formulario->informacion_aspirante->acceso_programas_computacionales()->save($acceso_programa_computacion);
				}
			}
		}
		$windows = $request->windows;
		if(isset($windows) && $windows == 'on'){
			$user->formulario->informacion_aspirante->Asp_Acceso_Windows = true;
		}
		else{
			$user->formulario->informacion_aspirante->Asp_Acceso_Windows = false;
		}
		$email = $request->correoElectronico;
		if(isset($email) && $email == 'on'){
			$user->formulario->informacion_aspirante->Asp_Acceso_Email = true;
		}
		else{
			$user->formulario->informacion_aspirante->Asp_Acceso_Email = false;
		}
		$edu_distancia = $request->educacionDistancia;
		if(isset($edu_distancia) && $edu_distancia == 'on'){
			$user->formulario->informacion_aspirante->Asp_Conoc_Educacion_Dist = true;
			$edu_distancia_descripcion = $request->edu_distancia_descripcion;
			if(isset($edu_distancia_descripcion) && !empty($edu_distancia_descripcion)){
				// dd($user->formulario->informacion_aspirante->educacion_distancia);
				if(is_null($user->formulario->informacion_aspirante->educacion_distancia)){
					$edu_distancia = new EducacionDistancia();
					$edu_distancia->EDi_Descripcion = $edu_distancia_descripcion;
					$user->formulario->informacion_aspirante->educacion_distancia()->save($edu_distancia);
				}
				else{
					$user->formulario->informacion_aspirante->educacion_distancia->EDi_Descripcion = $edu_distancia_descripcion;
					$user->formulario->informacion_aspirante->educacion_distancia->save();
				}
			}
			$user->formulario->informacion_aspirante->save();
		}
		else{
			$user->formulario->informacion_aspirante->Asp_Conoc_Educacion_Dist = false;
			if(!is_null($user->formulario->informacion_aspirante->educacion_distancia)){
				$user->formulario->informacion_aspirante->educacion_distancia->delete();
			}
		}
		$user->formulario->informacion_aspirante->save();

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

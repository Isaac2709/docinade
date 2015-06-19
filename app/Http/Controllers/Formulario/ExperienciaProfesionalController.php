<?php namespace App\Http\Controllers\Formulario;

use Auth;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ExperienciaProfesional;
use App\Ocupacion;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Requests\CrearExperienciaProfesionalRequest;

class ExperienciaProfesionalController extends Controller {

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
	public function store(CrearExperienciaProfesionalRequest $request)
	{
		$user = User::find(Auth::user()->Usu_ID);

		$experiencia_profesional_a_eliminar = $user->formulario->informacion_aspirante->seleccionarExperienciaProfesionalAEliminar($request->id_exp_prof);
		foreach ($experiencia_profesional_a_eliminar as $experiencia_profesional) {
			$experiencia_profesional->delete();
		}

		$pos = 0;
		// For each para recorrer toda la educacion superarior
		foreach ($request->empresa as $empresa) {
			$experiencia_profesional = null;
			// Revisa si existe la experiencia
			if(!empty($request->id_exp_prof[$pos])){
				// Si existe, entonces la consulta y actualiza el nombre del Proyecto.
				$experiencia_profesional = ExperienciaProfesional::find($request->id_exp_prof[$pos]);
				// $experiencia_profesional->Inv_Proyecto = $request->nombre[$pos];
			}
			else{
				// Si no existe, crea un nuevo modelo, le asigna el nombre del proyecto y lo guarda en la base de datos.
				$experiencia_profesional = new ExperienciaProfesional();
				// $experiencia_profesional->Inv_Proyecto = $request->nombre[$pos];
				// $user->formulario->informacion_aspirante->experiencias_investigaciones()->save($experiencia_investigacion);
			}
			// Revisa si se envia una institución, empresa en la investigación
			$institucion = $request->empresa[$pos];
			if(!empty($institucion)){
				$experiencia_profesional->Pro_Institucion = trim($institucion,
					" \t.");
			}
			$annio_inicio = $request->annio_inicio[$pos];
			if(!empty($annio_inicio)){
				$experiencia_profesional->Pro_Anio_Inicio = $request->annio_inicio[$pos];
			}
			// Ocupacion
			// Revisa si se envia una area de especialidad en la investigación
			$ocupacion = $request->ocupacion[$pos];
			if(!empty($ocupacion)){
				// Si se envia, consulta si existe en la base de datos, dicha institución
				$ocupacion = Ocupacion::where('Ocu_Ocupacion', '=', trim($request->ocupacion[$pos], " \t."))->first();
				if(is_null($ocupacion)){
					// Si la institución no existe, la crea y la guarda en la base de datos.
					$ocupacion = new Ocupacion();
					$ocupacion->Ocu_Ocupacion = trim($request->ocupacion[$pos], " \t.");
					$ocupacion->save();
				}
				// Finalmente le asigna la institución a la experiencia en investigación
				$experiencia_profesional->Pro_ID_Ocupacion = $ocupacion->Ocu_ID;
			}

			// Funciones que realiza en el trabajo actual
			if($pos == 0){
				$experiencia_profesional->Pro_Funciones = $request->descripcion_funciones;
				$experiencia_profesional->Pro_Actual = true;
				$experiencia_profesional->Pro_Anio_Fin = Carbon::now()->format('Y');
			}
			else{
				$annio_fin = $request->annio_fin[$pos];
				if(!empty($annio_fin)){
					$experiencia_profesional->Pro_Anio_Fin = $request->annio_fin[$pos];
				}
			}

			// Guardar en la base de datos
			if(!empty($request->id_exp_prof[$pos])){
				// Si existe, entonces la consulta y actualiza el nombre del Proyecto.
				$experiencia_profesional->save();
			}
			else{
				$user->formulario->informacion_aspirante->experiencias_profesionales()->save($experiencia_profesional);
			}
			$pos = $pos + 1;
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

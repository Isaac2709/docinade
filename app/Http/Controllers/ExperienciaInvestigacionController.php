<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CrearExperienciaInvestigacionRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\ExperienciaInvestigacion;
use App\Institucion;

use Illuminate\Http\Request;

class ExperienciaInvestigacionController extends Controller {

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
	public function store(CrearExperienciaInvestigacionRequest $request)
	{
		$user = User::find(Auth::user()->Usu_ID);

		$experiencias_investigaciones_a_eliminar = $user->formulario->informacion_aspirante->seleccionarInvestigacionesAEliminar($request->id_exp_inv);
		foreach ($experiencias_investigaciones_a_eliminar as $investigacion) {
			// echo "Elimino: ".$investigacion->Inv_Proyecto."<br />";
			$investigacion->delete();
		}

		$pos = 0;
		// For each para recorrer todas las experiencias en investigaciones
		foreach ($request->nombre as $nombre) {
			$experiencia_investigacion = null;
			// Revisa si existe la experiencia
			if(!empty($request->id_exp_inv[$pos])){
				// Si existe, entonces la consulta y actualiza el nombre del Proyecto.
				$experiencia_investigacion = ExperienciaInvestigacion::find($request->id_exp_inv[$pos]);
				$experiencia_investigacion->Inv_Proyecto = $request->nombre[$pos];
			}
			else{
				// Si no existe, crea un nuevo modelo, le asigna el nombre del proyecto y lo guarda en la base de datos.
				$experiencia_investigacion = new ExperienciaInvestigacion();
				$experiencia_investigacion->Inv_Proyecto = $request->nombre[$pos];
				$user->formulario->informacion_aspirante->experiencias_investigaciones()->save($experiencia_investigacion);
			}
			// Revisa si se envia una institución en la investigación
			if(!empty($request->institucion[$pos])){
				// Si se envia, consulta si existe en la base de datos, dicha institución
				$institucion = Institucion::where('Ins_Nombre', '=', trim($request->institucion[$pos], " \t."))->first();
				if(is_null($institucion)){
					// Si la institución no existe, la crea y la guarda en la base de datos.
					$institucion = new Institucion();
					$institucion->Ins_Nombre = trim($request->institucion[$pos], " \t.");
					$institucion->save();
				}
				// Finalmente le asigna la institución a la experiencia en investigación
				$experiencia_investigacion->Inv_ID_Institucion = $institucion->Ins_ID;
			}
			// Actualiza los datos faltantes
			$experiencia_investigacion->Inv_Lugar = $request->lugar[$pos];
			if(!empty($request->año[$pos])){
				$experiencia_investigacion->Inv_Anio = $request->año[$pos];
			}
			$experiencia_investigacion->save();
			$pos = $pos + 1;
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

<?php namespace App\Http\Controllers\Formulario;

use Auth;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CursoSeminario;

use Illuminate\Http\Request;
use App\Http\Requests\CrearCursoSeminarioRequest;

class CursoSeminarioController extends Controller {


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
	public function store(CrearCursoSeminarioRequest $request)
	{
		$user = User::find(Auth::user()->Usu_ID);

		$cursos_seminarios_a_eliminar = $user->formulario->informacion_aspirante->seleccionarCursosSeminariosAEliminar($request->id_cur_sem);
		foreach ($cursos_seminarios_a_eliminar as $curso_seminario) {
			$curso_seminario->delete();
		}

		$pos = 0;
		// For each para recorrer toda la educacion superarior
		foreach ($request->actividad as $actividad) {
			$curso_seminario = null;
			// Revisa si existe la experiencia
			if(!empty($request->id_cur_sem[$pos])){
				// Si existe, entonces la consulta y actualiza el nombre del Proyecto.
				$curso_seminario = CursoSeminario::find($request->id_cur_sem[$pos]);
				$curso_seminario->CSe_Actividad = $request->actividad[$pos];
			}
			else{
				// Si no existe, crea un nuevo modelo, le asigna el nombre del proyecto y lo guarda en la base de datos.
				$curso_seminario = new CursoSeminario();
				$curso_seminario->CSe_Actividad = $request->actividad[$pos];
			}
			// Actualiza los datos faltantes
			$curso_seminario->CSe_Institucion = $request->institucion[$pos];
			$curso_seminario->CSe_Lugar = $request->lugar[$pos];
			$annio = $request->annio[$pos];
			if(!empty($annio)){
				$curso_seminario->CSe_Annio = $request->annio[$pos];
			}
			// Guardar en la base de datos
			if(!empty($request->id_edu_sup[$pos])){
				// Si existe, entonces la consulta y actualiza el nombre del Proyecto.
				$curso_seminario->save();
			}
			else{
				$user->formulario->informacion_aspirante->cursos_seminarios()->save($curso_seminario);
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

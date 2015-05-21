<?php namespace App\Http\Controllers\Formulario;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use App\Institucion;
use App\GradoAcademico;
use App\EducacionSuperior;
use App\AreaEspecialidad;
use App\Pais;


// REQUESTS
use App\Http\Requests;
use App\Http\Requests\CrearEducacionSuperiorRequest;

use Illuminate\Http\Request;

class EducacionSuperiorController extends Controller {

	private $destinationPath = "";

	public function __construct()
	{
		$this->middleware('auth');
		$this->destinationPath = public_path().'/storage';
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
	public function store(CrearEducacionSuperiorRequest $request)
	{
		// dd($request->file('title_file'));
		$user = User::find(Auth::user()->Usu_ID);

		$educacion_superior_a_eliminar = $user->formulario->informacion_aspirante->seleccionarEducacionSuperiorAEliminar($request->id_edu_sup);
		foreach ($educacion_superior_a_eliminar as $educacion) {
			$educacion->delete();
		}

		$pos = 0;
		// For each para recorrer toda la educacion superarior
		foreach ($request->institucion as $nombre) {
			$educacion_superior = null;
			// Revisa si existe la experiencia
			if(!empty($request->id_edu_sup[$pos])){
				// Si existe, entonces la consulta y actualiza el nombre del Proyecto.
				$educacion_superior = EducacionSuperior::find($request->id_edu_sup[$pos]);
				// $educacion_superior->Inv_Proyecto = $request->nombre[$pos];
			}
			else{
				// Si no existe, crea un nuevo modelo, le asigna el nombre del proyecto y lo guarda en la base de datos.
				$educacion_superior = new EducacionSuperior();
				// $educacion_superior->Inv_Proyecto = $request->nombre[$pos];
				// $user->formulario->informacion_aspirante->experiencias_investigaciones()->save($experiencia_investigacion);
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
				$educacion_superior->Sup_ID_Institucion = $institucion->Ins_ID;
			}
			// PAIS
			$pais = $request->pais[$pos];
			if(!empty($pais)){
				// Consulta a la base de datos si el país existe
				$pais = Pais::where('Pais_Nombre', '=', $request->pais[$pos])->first();
				if(is_null($pais)){
					// Si el país no existe, regresa a la página anterior con los errores
					return redirect()->back()->withErrors(['El país de residencia no existe']);
				}
				// Guarda el ID del país de residencia en la tabla del aspirante
				$educacion_superior->Sup_ID_Pais = $pais->Pais_ID; //ID de la tabla GEN_Pais

			}
			// Actualiza los datos faltantes
			$educacion_superior->Sup_ID_Grado_Acad = $request->gradoA[$pos];
			if(!empty($request->añoG[$pos])){
				$educacion_superior->Sup_Anio_Grad = $request->añoG[$pos];
			}
			// AREA DE ESPECIALIDAD
			// Revisa si se envia una area de especialidad en la investigación
			$area_especialidad = $request->area_especialidad[$pos];
			if(!empty($area_especialidad)){
				// Si se envia, consulta si existe en la base de datos, dicha institución
				$area_especialidad = AreaEspecialidad::where('Esp_Area', '=', trim($request->area_especialidad[$pos], " \t."))->first();
				if(is_null($area_especialidad)){
					// Si la institución no existe, la crea y la guarda en la base de datos.
					$area_especialidad = new AreaEspecialidad();
					$area_especialidad->Esp_Area = trim($request->area_especialidad[$pos], " \t.");
					$area_especialidad->save();
				}
				// Finalmente le asigna la institución a la experiencia en investigación
				$educacion_superior->Sup_ID_Area_Esp = $area_especialidad->Esp_ID;
			}
			// Archivo adjunto del título
			if (isset($request->file('title_file')[$pos])) {
	            $file = $request->file('title_file')[$pos];
		        $name_file = $file->getClientOriginalName();
		        $trozos = explode(".", $name_file);
		        $extension = end($trozos);
		        $id_filename = $user->Usu_Nombre.'_'.rand(10, 99999999).'.'.$file->getClientOriginalName();
		        \Illuminate\Support\Facades\Request::file('title_file')[$pos]->move($this->destinationPath.'/images/', $id_filename);
	            $educacion_superior->Sup_Adjunto = $id_filename;
	        }
			// Guardar en la base de datos
			if(!empty($request->id_edu_sup[$pos])){
				// Si existe, entonces la consulta y actualiza el nombre del Proyecto.
				$educacion_superior->save();
			}
			else{
				$user->formulario->informacion_aspirante->educacion_superior()->save($educacion_superior);
			}
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

<?php namespace App\Http\Controllers\Formulario;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\ConocimientoIdioma;

use Illuminate\Http\Request;
use App\Http\Requests\CrearConocimientoIdiomaRequest;

class ConocimientoIdiomaController extends Controller {

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
	public function store(CrearConocimientoIdiomaRequest $request)
	{
		$user = User::find(Auth::user()->Usu_ID);

		$conocimiento_idioma_a_eliminar = $user->formulario->informacion_aspirante->seleccionarConocimientoIdiomasAEliminar($request->id_con_idioma);
		foreach ($conocimiento_idioma_a_eliminar as $conocimiento_idioma) {
			$conocimiento_idioma->delete();
		}
		$pos = 0;
		// For each para recorrer todos los conocimientos de idiomas
		foreach ($request->idioma as $idioma) {
			$conocimiento_idioma = null;
			// Revisa si existe la experiencia
			if(!empty($request->id_con_idioma[$pos])){
				// Si existe, entonces la consulta.
				$conocimiento_idioma = ConocimientoIdioma::find($request->id_con_idioma[$pos]);
			}
			else{
				// Si no existe, crea un nuevo modelo, le asigna el nombre del proyecto y lo guarda en la base de datos.
				$conocimiento_idioma = new ConocimientoIdioma();
			}

			// Archivo adjunto que certifique el conocimiento mencionado
			if (isset($request->file('archivo')[$pos])) {
	            $file = $request->file('archivo')[$pos];
		        $name_file = $file->getClientOriginalName();
		        $trozos = explode(".", $name_file);
		        $extension = end($trozos);
		        $id_filename = $user->Usu_Nombre.'_'.'certificate'.'_'.rand(10, 99999999).'.'.$extension;
		        \Illuminate\Support\Facades\Request::file('archivo')[$pos]->move($this->destinationPath.'/certificates/', $id_filename);
	            $conocimiento_idioma->Idm_Adjunto = $id_filename;
	        }
	        // Actualiza los datos faltantes
	        $conocimiento_idioma->Idm_Idioma = $request->idioma[$pos];
	        $nivel_escr = $request->nivelEscritura[$pos];
	        if(!empty($nivel_escr)){
	        	$conocimiento_idioma->Idm_ID_Niv_Escr = $request->nivelEscritura[$pos];
	        }
	        $nivel_lect = $request->nivelLectura[$pos];
	        if(!empty($nivel_lect)){
		        $conocimiento_idioma->Idm_ID_Niv_Lect = $request->nivelLectura[$pos];
		    }
	        $nivel_conver = $request->nivelCoversacional[$pos];
	        if(!empty($nivel_conver)){
	        	$conocimiento_idioma->Idm_ID_Niv_Conv = $request->nivelCoversacional[$pos];
	    	}
	        // Guardar en la base de datos
			if(!empty($request->id_con_idioma[$pos])){
				// Si existe, entonces la consulta y actualiza el nombre del Proyecto.
				$conocimiento_idioma->save();
			}
			else{
				$user->formulario->informacion_aspirante->conocimiento_idiomas()->save($conocimiento_idioma);
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

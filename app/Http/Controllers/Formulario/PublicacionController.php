<?php namespace App\Http\Controllers\Formulario;

use Auth;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Publicacion;
use App\Pais;

use Illuminate\Http\Request;
use App\Http\Requests\CrearPublicacionRequest;

class PublicacionController extends Controller {

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
	public function store(CrearPublicacionRequest $request)
	{
		$user = User::find(Auth::user()->Usu_ID);
		// dd($request);
		$publicaciones_a_eliminar = $user->formulario->informacion_aspirante->seleccionarPublicacionesAEliminar($request->id_pub);
		foreach ($publicaciones_a_eliminar as $publicacion) {
			// echo "Elimino: ".$investigacion->Inv_Proyecto."<br />";
			$publicacion->delete();
		}

		$pos = 0;
		// For each para recorrer todas las publicaciones del aspirante
		foreach ($request->titulo_publicacion as $titulo_publicacion) {
			$publicacion = null;
			// Revisa si existe la experiencia
			if(!empty($request->id_pub[$pos])){
				// Si existe, entonces la consulta y actualiza el titulo de la publicacion.
				$publicacion = Publicacion::find($request->id_pub[$pos]);
				$experiencia_investigacion->Pub_Titulo = $request->titulo_publicacion[$pos];
			}
			else{
				// Si no existe, crea un nuevo modelo, le asigna el titulo de la publicacion
				// y lo guarda en la base de datos.
				$publicacion = new Publicacion();
				$publicacion->Pub_Titulo = $request->titulo_publicacion[$pos];
				$user->formulario->informacion_aspirante->publicaciones()->save($publicacion);
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
				$publicacion->Pub_ID_Pais = $pais->Pais_ID; //ID de la tabla GEN_Pais

			}
			// Actualiza los datos faltantes
			$publicacion->Pub_Medio = $request->titulo_medio_publicacion[$pos];
			if(!empty($request->annio[$pos])){
				$publicacion->Pub_Anio = $request->annio[$pos];
			}
			$publicacion->save();
			$pos = $pos + 1;
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

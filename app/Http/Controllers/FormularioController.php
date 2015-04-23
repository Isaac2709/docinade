<?php namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Formulario;
use App\Pais;
use App\InformacionAspirante;
use App\Enfasis;
use App\DireccionActual;
use App\AreaInteres;
use App\Nacionalidad;
use App\Email;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FormularioController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$paises = Pais::all()->lists('Pais_Nombre');
		$nacionalidades = Nacionalidad::all()->lists('Nac_Nombre');
		$enfasis = Enfasis::all();
		$user = User::find(Auth::user()->Usu_ID);
		if(!$user->usuarioTieneFormulario()){
			$formulario = new Formulario();
			$user->formulario()->save($formulario);

			$formulario = Formulario::find($user->formulario->IPe_ID);
			$informacion_aspirante = new InformacionAspirante();
			$formulario->informacion_aspirante()->save($informacion_aspirante);

			// Crear y guardar direccion actual
			$direccion_actual = new DireccionActual();
			$direccion_actual->save();

			// Asociar la direccion actual al formulario del aspirante
			$informacion_aspirante = InformacionAspirante::find($formulario->informacion_aspirante->Asp_ID);
			$informacion_aspirante->direccion_actual()->associate($direccion_actual);
			$informacion_aspirante->save();

			// // Crear y guardar área de interes
			// $area_interes = new AreaInteres();
			// $area_interes->save();

			// Asociar el área de interes al formulario del aspirante
			$informacion_aspirante = InformacionAspirante::find($formulario->informacion_aspirante->Asp_ID);
			$informacion_aspirante->area_interes()->associate($area_interes);
			$informacion_aspirante->save();
		}

		return view('formulario.index')->with('paises', json_encode($paises))->with('nacionalidades', json_encode($nacionalidades))->with('enfasis', $enfasis)->with('user', $user);
	}

	public function postIndex(Request $request)
	{
		$user = User::find(Auth::user()->Usu_ID);/

		// Informacion Personal
		$user->formulario->IPe_Nombre = $request->nombre;
		$user->formulario->IPe_Apellido = $request->apellidos;
		$user->formulario->IPe_Genero = $request->genero;
		$user->formulario->IPe_Pasaporte = $request->id;

		// Revisa si la fecha de nacimiento es enviada
		$fecha_nacimiento = $request->fecha_nacimiento;
		if(!empty($fecha_nacimiento)){
			$date_obj = date_create_from_format('d/m/Y',$fecha_nacimiento);
			$date = date_format($date_obj, 'Y-m-d');

			$user->formulario->IPe_Fecha_Nac = $date;
		}

		$nacionalidad = $request->nacionalidad;
		if(!empty($nacionalidad)){
			// Consulta a la base de datos si el país existe
			$nacionalidad = Nacionalidad::where('Nac_Nombre', '=', $request->nacionalidad)->first();
			if(is_null($nacionalidad)){
				// Si el país no existe, regresa a la página anterior con los errores
				return redirect()->back()->withErrors();
			}
			// Guarda el ID del país de residencia en la tabla del aspirante
			$user->formulario->informacion_aspirante->Asp_ID_Nac = $nacionalidad->Nac_ID; //ID de la tabla GEN_Pais
		}
		$user->formulario->IPe_Telefono = $request->telefono;
		$user->formulario->IPe_Fax = $request->fax;

		$email = $request->email;
		if(!empty($email)){
			if(!$user->formulario->formularioTieneEmail($email)){
				$email = new Email();
				$email->Email_Email = $request->email;
				$user->formulario->emails()->save($email);
			}
		}

		// Informacion del Aspirante
		$user->formulario->informacion_aspirante->Asp_Lugar_Nac = $request->lugar_nacimiento;
		$enfasis = $request->enfasis;
		if(!empty($enfasis)){
			$user->formulario->informacion_aspirante->Asp_ID_Enfasis = $request->enfasis;
		}
		// Area de interés para desarrollar el tema de investigación
		$user->formulario->informacion_aspirante->Asp_Area_Interes = $request->area_investigacion;

		$user->formulario->informacion_aspirante->save();


		// Direccion Actual del Aspirante
		$pais_residencia = $request->pais_residencia;
		if(!empty($pais_residencia)){
			// Consulta a la base de datos si el país existe
			$pais_residencia = Pais::where('Pais_Nombre', '=', $request->pais_residencia)->first();
			if(is_null($pais_residencia)){
				// Si el país no existe, regresa a la página anterior con los errores
				return redirect()->back()->withErrors();
			}
			// Guarda el ID del país de residencia en la tabla del aspirante
			$user->formulario->informacion_aspirante->direccion_actual->DiA_ID_Pais = $pais_residencia->Pais_ID; //ID de la tabla GEN_Pais

		}
		$user->formulario->informacion_aspirante->direccion_actual->DiA_Ciudad = $request->ciudad;
		$user->formulario->informacion_aspirante->direccion_actual->DiA_Cod_Postal = $request->codigo_postal;
		$user->formulario->informacion_aspirante->direccion_actual->DiA_Dir_Corresp = $request->direccion_correspondencia;

		$user->formulario->informacion_aspirante->direccion_actual->save();
		// Fin de la direccion actual

		// Fin de la Información personal del aspirante

		return redirect()->back()->withInput();
		// dd($formulario);
		// $user->formulario()->save($formulario);
		// Auth::user()->formulario()->informacion_aspirante($informacion_aspirante);
				// $data = \DB::table('ASP_Aspirante')
  //             	->where('GEN_ID_Usuario', '=',Auth::user()->Usu_ID)
  //             	->first();
  //       dd($data);
		// $formulario->save();
		// echo "-> ".Auth::user()->usuarioTieneFormulario();
		// $data = $request->all();
		// dd($formulario);
		// echo "<br />"."USUARIO"."<br />";
		// dd(Auth::user());
		// $users = User::all();
		// return "".$users;
		// return "".$users;
		// $var = cnsulta;
		// return view('formulario.index');
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
	public function store()
	{
		//
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

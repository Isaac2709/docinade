<?php namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Formulario;
use App\Pais;
use App\InformacionAspirante;
use App\Enfasis;
use App\DireccionActual;
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
		}

		return view('formulario.index')->with('paises', json_encode($paises))->with('enfasis', $enfasis)->with('user', $user);
	}

	public function postIndex(Request $request)
	{
		$user = User::find(Auth::user()->Usu_ID);

		// Informacion Personal
		$user->formulario->IPe_Nombre = $request->nombre;
		$user->formulario->IPe_Apellido = $request->apellidos;
		$user->formulario->IPe_Genero = $request->genero;
		$user->formulario->IPe_Pasaporte = $request->id;

		$fecha_nacimiento = $request->fecha_nacimiento;
		$date_obj = date_create_from_format('d/m/Y',$fecha_nacimiento);
		$date = date_format($date_obj, 'Y-m-d');

		$user->formulario->IPe_Fecha_Nac = $date;

		$user->formulario->IPe_Telefono = $request->telefono;
		$user->formulario->IPe_Fax = $request->fax;
		$user->formulario->save();

		// Informacion del Aspirante
		$user->formulario->informacion_aspirante->Asp_Lugar_Nac = $request->lugar_nacimiento;
		$user->formulario->informacion_aspirante->Asp_ID_Enfasis = $request->enfasis;
		// $user->formulario->informacion_aspirante->Asp_ID_Enfasis = $request->enfasis;
		$user->formulario->informacion_aspirante->save();


		// Direccion Actual del Aspirante
		$pais_residencia = $request->pais_residencia;
		if(!empty($pais_residencia)){
			echo "".($pais_residencia);
			$pais_residencia = Pais::where('Pais_Nombre', '=', $request->pais_residencia)->first();
			if(is_null($pais_residencia)){
				return redirect()->back()->withErrors();
			}
			$user->formulario->informacion_aspirante->direccion_actual->DiA_ID_Pais = $pais_residencia->Pais_ID; //ID de la tabla GEN_Pais

		}
		$user->formulario->informacion_aspirante->direccion_actual->DiA_Ciudad = $request->ciudad;
		$user->formulario->informacion_aspirante->direccion_actual->DiA_Cod_Postal = $request->codigo_postal;
		$user->formulario->informacion_aspirante->direccion_actual->DiA_Dir_Corresp = $request->direccion_correspondencia;

		$user->formulario->informacion_aspirante->direccion_actual->save();

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

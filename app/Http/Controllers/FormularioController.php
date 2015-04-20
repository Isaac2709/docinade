<?php namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Formulario;
use App\Pais;
use App\InformacionAspirante;
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
		// $users = User::all();
		// return "".$users;
		// return "".$users;
		// $var = cnsulta;
		$paises = Pais::all()->lists('Pais_Nombre');
		$user = User::find(Auth::user()->Usu_ID);
		return view('formulario.index')->with('paises', json_encode($paises))->with('user', $user);
	}

	public function postIndex(Request $request)
	{
		$user = User::find(Auth::user()->Usu_ID);

		if(!Auth::user()->usuarioTieneFormulario()){
			$formulario = new Formulario();
			$informacion_aspirante = new InformacionAspirante();
			$user->formulario->save($formulario);
		}
		$pais_residencia = $request->pais_residencia;
		if(!empty($pais_residencia)){
			$pais_residencia = Pais::where('Pais_Nombre', '=', $request->pais_residencia)->first();
			$formulario->IPe_ID_PaisRes = $pais_residencia->Pais_ID; //ID de la tabla GEN_Pais
		}
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
		// $date = date_create('2000-01-01');

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

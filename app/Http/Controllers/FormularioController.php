<?php namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Formulario;
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
		return view('formulario.index');
	}

	public function postIndex(Request $request)
	{
		// return Auth::user()->Usu_Nombre."<br />"."ID: ".Auth::user()->Usu_ID;
		$formulario = Auth::user()->formulario();

		if(!Auth::user()->usuarioTieneFormulario()){
			$formulario = new Formulario();
			$informacion_aspirante = new InformacionAspirante();
			$pais_residencia = Pais::find($request->pais_residencia);
		}
		$formulario->IPe_Nombre = $request->nombre;
		$formulario->IPe_Apellido = $request->apellidos;
		$formulario->IPe_Genero = $request->genero;
		$formulario->IPe_Fecha_Nac = $request->fecha_nacimiento;
		$formulario->IPe_ID_PaisRes = $request->pais_residencia; //ID de la tabla GEN_Pais
		$formulario->IPe_Telefono = $request->telefono;
		$formulario->IPe_Fax = $request->fax;

		$formulario->Asp_Lugar_Nac = $request->nacionalidad;
		Auth::user()->formulario()->informacion_personal($informacion_personal);
		Auth::user()->formulario()->save($formulario);

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

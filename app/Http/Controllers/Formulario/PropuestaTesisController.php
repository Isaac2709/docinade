<?php namespace App\Http\Controllers\Formulario;

use Auth;
use App\User;
use App\PropuestaTesis;
use App\Bibliografia;
// use App\PropuestaTesis;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PropuestaTesisController extends Controller {

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
	public function store(Request $request)
	{
		$user = User::find(Auth::user()->Usu_ID);
		if(is_null($user->formulario->informacion_aspirante->ID_Prop_Tesis)){
			$propuesta_tesis = new PropuestaTesis();
			$propuesta_tesis->save();
			$user->formulario->informacion_aspirante->propuesta_tesis()->associate($propuesta_tesis);
			$user->formulario->informacion_aspirante->save();
		}
		$user->formulario->informacion_aspirante->propuesta_tesis->PTe_Definicion = $request->definicion;
		$user->formulario->informacion_aspirante->propuesta_tesis->PTe_Marco_Teorico = $request->marco_teorico;
		$user->formulario->informacion_aspirante->propuesta_tesis->PTe_Metodologia = $request->metodologia;
		$user->formulario->informacion_aspirante->propuesta_tesis->PTe_Objetivos = $request->objetivos;
		$user->formulario->informacion_aspirante->propuesta_tesis->PTe_Bibliografia = $request->bibliografia;

		$user->formulario->informacion_aspirante->propuesta_tesis->save();

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

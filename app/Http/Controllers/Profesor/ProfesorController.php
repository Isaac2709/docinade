<?php namespace App\Http\Controllers\Profesor;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Formulario;

use Illuminate\Http\Request;
use App\Http\Requests\ActualizarProfesorRequest;

class ProfesorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function forms(){
		$users=User::rightJoin('GEN_Info_Personal', 'Gen_Usuario.Usu_ID', '=', 'GEN_Info_Personal.GEN_ID_Usuario')
			->join('ASP_Aspirante', 'GEN_Info_Personal.IPe_ID', '=', 'ASP_Aspirante.Asp_ID_InfoPer')
			->join('ASP_Nacionalidad', 'ASP_Aspirante.Asp_ID_Nac', '=', 'ASP_Nacionalidad.Nac_ID')
			->select('Gen_Usuario.Usu_Tipo','Gen_Usuario.Usu_ID', 'GEN_Info_Personal.IPe_Nombre', 'GEN_Info_Personal.IPe_Apellido', 'GEN_Info_Personal.IPe_Pasaporte', 'GEN_Info_Personal.IPe_Genero', 'ASP_Aspirante.Asp_Estado_Formulario', 'ASP_Nacionalidad.Nac_Nombre')
			->where('Gen_Usuario.Usu_Tipo', '=', 'Aspirante')
			->orderBy('Asp_Estado_Formulario', 'desc')
			->get();
		$forms = Formulario::all();
		return view('profesor.forms')->with('users', $users)->with('forms', $forms);; /*como segundo parametro se le puede dar las variables users donde esta la coleccion de usuarios*/
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
		$profesor = User::findOrFail($id);
		return view('profesor.profile')->with('profesor', $profesor);
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
	public function update(ActualizarProfesorRequest $request, $id)
	{
		$admin = User::findOrFail($id);
		$admin->Usu_Nombre = $request->nombre_completo;
		$admin->email = $request->email;
		$password = $request->password;
		if(!empty($password)){
	    	$admin->password = bcrypt($request->password);
	    }
		$admin->save();
		return redirect()->back()->withInput()->with('successMessage', trans('alert.alert_admin.updated'));
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

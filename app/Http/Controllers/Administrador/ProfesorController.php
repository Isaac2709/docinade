<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;
use App\Http\Requests\CrearProfesorRequest;

class ProfesorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$profesores = User::where('Usu_Tipo', '=', 'Profesor')->get();
		return view('administrador.profesor.index')->with('profesores', $profesores);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('administrador.profesor.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearProfesorRequest $request)
	{
		$user = new User();
		$user->Usu_Nombre = $request->nombre_completo;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->Usu_Tipo = 'Profesor';
		$user->save();

		return redirect()->back()->withInput()->with('successMessage', trans('alert.alert_professor.created'));
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
		$admin = User::findOrFail($id);
		return view('administrador.profesor.edit')->with('admin', $admin);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$admin = User::findOrFail($id);
		$admin->Usu_Nombre = $request->nombre_completo;
		$admin->email = $request->email;
		$password = $request->password;
		if(!empty($password)){
	    	$admin->password = bcrypt($request->password);
	    }
		$admin->save();
		return redirect()->back()->withInput()->with('successMessage', trans('alert.alert_professor.updated'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$admin = User::findOrFail($id);
		$admin->delete();
		$message = 'El usuario de tipo profesor <b>'.$admin->Usu_Nombre.'</b> fue eliminado.';
		return redirect()->back()->with('successMessage', $message);
	}

}

<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;

class ProfesorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$professors = User::where('Usu_Tipo', '=', 'Profesor')->get();
		return view('administrador.index')->with('professors', $professors);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('profesor.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User();
		$user->Usu_Nombre = $request->nombre_completo;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->Usu_Tipo = 'Administrador';
		$user->save();

		return redirect()->back()->withInput()->with('successMessage', trans('alert.alert_admin.created'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$admin = User::findOrFail($id);
		return view('profesor.profile')->with('admin', $admin);
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
		return view('profesor.edit')->with('admin', $admin);
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
		$admin = User::findOrFail($id);
		$admin->delete();
		$message = 'El usuario de tipo profesor <b>'.$admin->Usu_Nombre.'</b> fue eliminado.';
		return redirect()->back()->with('successMessage', $message);
	}

}

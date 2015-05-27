<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;
use App\Http\Requests\CrearAdministradorRequest;

class AdministradorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$admins = User::where('Usu_Tipo', '=', 'Administrador')->get();
		return view('administrador.index')->with('admins', $admins);

	}

	public function forms(){
		//where('Usu_Tipo','==','Administrador')->
		$users=User::where('Usu_Tipo', '=', 'Aspirante')->paginate();/*variable referente a la coleccion de usuarios*/
		//dd($users);
		return view('consultas.index', compact('users')); /*como segundo parametro se le puede dar las variables users donde esta la coleccion de usuarios*/
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('administrador.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearAdministradorRequest $request)
	{
		$user = new User();
		$user->Usu_Nombre = $request->nombre_completo;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->Usu_Tipo = 'Administrador';
		$user->save();

		$message = 'El usuario de tipo administrador ha sido agregado.';
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
		$admin = User::findOrFail($id);
		return view('administrador.edit')->with('admin', $admin);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$admin = User::findOrFail($id);
		$admin->Usu_Nombre = $request->nombre_completo;
		$admin->email = $request->email;
		$password = $request->password;
		if(!empty($password)){
	    	$admin->password = bcrypt($request->password);
	    }
		$admin->save();
		$message = 'El usuario de tipo administrador ha sido actualizado.';
		return redirect()->back()->withInput()->with('successMessage', [$message]);
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

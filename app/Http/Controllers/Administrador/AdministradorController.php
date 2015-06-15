<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;
use App\Http\Requests\CrearAdministradorRequest;
use App\Http\Requests\ActualizarAdministradorRequest;

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
		// $users=User::where('Usu_Tipo', '=', 'Aspirante')->paginate();/*variable referente a la coleccion de usuarios*/
		$users=User::rightJoin('GEN_Info_Personal', 'Gen_Usuario.Usu_ID', '=', 'GEN_Info_Personal.GEN_ID_Usuario')
			->join('ASP_Aspirante', 'GEN_Info_Personal.IPe_ID', '=', 'ASP_Aspirante.Asp_ID_InfoPer')
			->join('GEN_Email', 'GEN_Info_Personal.IPe_ID', '=', 'GEN_Email.Email_ID_InfoPer')
			->join('ASP_Nacionalidad', 'ASP_Aspirante.Asp_ID_Nac', '=', 'ASP_Nacionalidad.Nac_ID')
			->select('Gen_Usuario.Usu_Tipo','Gen_Usuario.Usu_ID', 'GEN_Info_Personal.IPe_Nombre', 'GEN_Info_Personal.IPe_Apellido', 'GEN_Info_Personal.IPe_Pasaporte', 'GEN_Info_Personal.IPe_Genero', 'GEN_Email.Email_Email', 'ASP_Aspirante.Asp_Estado_Formulario', 'ASP_Nacionalidad.Nac_Nombre')
			->orderBy('Asp_Estado_Formulario', 'desc')
			->paginate(5);

		// $users=\DB::table('Gen_Usuario')
		// 	->rightJoin('GEN_Info_Personal', 'Gen_Usuario.Usu_ID', '=', 'GEN_Info_Personal.GEN_ID_Usuario')
		// 	->join('ASP_Aspirante', 'GEN_Info_Personal.IPe_ID', '=', 'ASP_Aspirante.Asp_ID_InfoPer')
		// 	->join('GEN_Email', 'GEN_Info_Personal.IPe_ID', '=', 'GEN_Email.Email_ID_InfoPer')
		// 	->join('ASP_Nacionalidad', 'ASP_Aspirante.Asp_ID_Nac', '=', 'ASP_Nacionalidad.Nac_ID')
		// 	->select('Gen_Usuario.Usu_ID', 'GEN_Info_Personal.IPe_Nombre', 'GEN_Info_Personal.IPe_Apellido', 'GEN_Info_Personal.IPe_Pasaporte', 'GEN_Info_Personal.IPe_Genero', 'GEN_Email.Email_Email', 'ASP_Aspirante.Asp_Estado_Formulario', 'ASP_Nacionalidad.Nac_Nombre')
		// 	->orderBy('Asp_Estado_Formulario', 'desc')
		// 	->get();
		// dd($users);
		return view('consultas.index')->with('users', $users); /*como segundo parametro se le puede dar las variables users donde esta la coleccion de usuarios*/
	}

	public function aspirantFormData(){
		if (\Request::ajax()) {
			$users=User::rightJoin('GEN_Info_Personal', 'Gen_Usuario.Usu_ID', '=', 'GEN_Info_Personal.GEN_ID_Usuario')
			->join('ASP_Aspirante', 'GEN_Info_Personal.IPe_ID', '=', 'ASP_Aspirante.Asp_ID_InfoPer')
			->join('GEN_Email', 'GEN_Info_Personal.IPe_ID', '=', 'GEN_Email.Email_ID_InfoPer')
			->join('ASP_Nacionalidad', 'ASP_Aspirante.Asp_ID_Nac', '=', 'ASP_Nacionalidad.Nac_ID')
			->select('Gen_Usuario.Usu_Tipo','Gen_Usuario.Usu_ID', 'GEN_Info_Personal.IPe_Nombre', 'GEN_Info_Personal.IPe_Apellido', 'GEN_Info_Personal.IPe_Pasaporte', 'GEN_Info_Personal.IPe_Genero', 'GEN_Email.Email_Email', 'ASP_Aspirante.Asp_Estado_Formulario', 'ASP_Nacionalidad.Nac_Nombre')
			->orderBy('Asp_Estado_Formulario', 'desc')
			->get();
			return \Response::json(
				$users
	    	);
		}
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
		return view('administrador.profile')->with('admin', $admin);
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
	public function update(ActualizarAdministradorRequest $request, $id)
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
		$message = 'El usuario de tipo administrador <b>'.$admin->Usu_Nombre.'</b> fue eliminado.';
		return redirect()->back()->with('successMessage', $message);
	}

}

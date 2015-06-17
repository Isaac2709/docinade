<?php namespace App\Http\Controllers\Formulario;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Recomendacion;
use App\Email;

use Illuminate\Http\Request;
use App\Http\Requests\CrearRecomendacionesRequest;

class RecomendacionController extends Controller {

	private $destinationPath = "";

	public function __construct()
	{
		$this->middleware('auth');
		$this->destinationPath = public_path().'/storage';
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
	public function store(CrearRecomendacionesRequest $request)
	{
		$user = User::find(Auth::user()->Usu_ID);
		$recomendacion1 = null;
		$recomendacion2 = null;
		if ($user->formulario->informacion_aspirante->recomendaciones->isEmpty()){
			$recomendacion1 = new Recomendacion();
			$recomendacion1->Rec_Nombre_Completo = $request->nombre1;

			$user->formulario->informacion_aspirante->recomendaciones()->save($recomendacion1);

			$nombre_recomendacion2 = $request->nombre2;
			if(!empty($nombre_recomendacion2)){
				$recomendacion2 = new Recomendacion();
				$recomendacion2->Rec_Nombre_Completo = $request->nombre2;
				$user->formulario->informacion_aspirante->recomendaciones()->save($recomendacion2);
			}
		}
		else{
			$recomendacion1 = $user->formulario->informacion_aspirante->recomendaciones()->first();
			if($user->formulario->informacion_aspirante->recomendaciones()->count() > 1){
				$recomendacion2 = $user->formulario->informacion_aspirante->recomendaciones[1];
			}
			else{
				$nombre_recomendacion2 = $request->nombre2;
				if(!empty($nombre_recomendacion2)){
					$recomendacion2 = new Recomendacion();
					$recomendacion2->Rec_Nombre_Completo = $request->nombre2;
					$user->formulario->informacion_aspirante->recomendaciones()->save($recomendacion2);
				}
			}
		}
		$recomendacion1->Rec_Nombre_Completo = $request->nombre1;
		$recomendacion1->Rec_Direccion = $request->direccion1;
		$recomendacion1->Rec_Telefono = $request->telefono1;
		$recomendacion1->Rec_Fax = $request->fax1;
		$recomendacion1->Rec_Ocupacion = $request->posicion1;
		$email = $request->email1;
		if(!empty($email)){
			if(is_null($recomendacion1->Rec_ID_Email)){
				$email = new Email();
				$email->Email_Email = $request->email1;
				$email->save();

				$recomendacion1->email()->associate($email);
			}
			else{
				$recomendacion1->email->Email_Email = $request->email1;
				$recomendacion1->email->save();
			}
		}
		// Archivo adjunto de la carta de recomendacion
		if ($request->hasFile('archivo_recomendacion1')) {
            $file = $request->file('archivo_recomendacion1');
	        $name_file = $file->getClientOriginalName();
	        // dd($file->getClientMimeType() );
	        $trozos = explode(".", $name_file);
	        $extension = end($trozos);
	        $carta_recomendacion = $user->Usu_Nombre.'_'.'recommendation1'.'_'.rand(10, 99999999).'.'.$extension;
	        \Illuminate\Support\Facades\Request::file('archivo_recomendacion1')->move($this->destinationPath.'/letter_recommendation/', $carta_recomendacion);
            $recomendacion1->Rec_Adjunto = $carta_recomendacion;
        }
		// $recomendacion1->Rec_Adjunto = $request->archivoRecomendaciones1;
		$recomendacion1->save();

		if(!is_null($recomendacion2)){
			$recomendacion2->Rec_Nombre_Completo = $request->nombre2;
			$recomendacion2->Rec_Direccion = $request->direccion2;
			$recomendacion2->Rec_Telefono = $request->telefono2;
			$recomendacion2->Rec_Fax = $request->fax2;
			$recomendacion2->Rec_Ocupacion = $request->posicion2;
			$email2 = $request->email2;
			if(!empty($email2)){
				if(is_null($recomendacion2->Rec_ID_Email)){
					$email2 = new Email();
					$email2->Email_Email = $request->email2;
					$email2->save();

					$recomendacion2->email()->associate($email2);

				}
				else{
					$recomendacion2->email->Email_Email = $request->email2;
					$recomendacion2->email->save();
				}
			}
			// Archivo adjunto de la carta de recomendacion
			if ($request->hasFile('archivo_recomendacion2')) {
	            $file = $request->file('archivo_recomendacion2');
		        $name_file = $file->getClientOriginalName();
		        // dd($file->getClientMimeType() );
		        $trozos = explode(".", $name_file);
		        $extension = end($trozos);
		        $carta_recomendacion2 = $user->Usu_Nombre.'_'.'recommendation2'.'_'.rand(10, 99999999).'.'.$extension;
		        \Illuminate\Support\Facades\Request::file('archivo_recomendacion2')->move($this->destinationPath.'/letter_recommendation/', $carta_recomendacion2);
	            $recomendacion2->Rec_Adjunto = $carta_recomendacion2;
	        }
			// $recomendacion2->Rec_Adjunto = $request->archivoRecomendaciones2;
			$recomendacion2->save();
		}

		return redirect()->back()->withInput()->with('successMessage', trans('alert.alert_form.updated'));
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

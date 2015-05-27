<?php namespace App\Http\Controllers\Formulario;

// MODELS
use Auth;
use App\User;
use App\Formulario;
use App\Pais;
use App\InformacionAspirante;
use App\Enfasis;
use App\DireccionActual;
use App\AreaInteres;
use App\Nacionalidad;
use App\Email;
use App\Institucion;
use App\GradoAcademico;
use App\EducacionSuperior;
use App\AreaEspecialidad;
use App\Ocupacion;
use App\NivelIdioma;
use App\Http\Controllers\Controller;

// PDFGenerate
// use Vsmoraes\Pdf\Pdf;

// CARBON
use Carbon\Carbon;

// REQUESTS
use App\Http\Requests;
use App\Http\Requests\CrearFormularioRequest;

// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

class FormularioController extends Controller {

	private $destinationPath = "";
	// private $pdf;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(/*Pdf $dompdf*/)
	{
		// $this->pdf = $dompdf;
		$this->middleware('auth');
		$this->destinationPath = public_path().'/storage';
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$paises = Pais::all()->lists('Pais_Nombre');
		$nacionalidades = Nacionalidad::all()->lists('Nac_Nombre');
		$enfasis = Enfasis::all();
		$grados_academicos = GradoAcademico::all();
		$areas_especialidad = AreaEspecialidad::all()->lists('Esp_Area');
		$niveles_idioma = NivelIdioma::orderBy('Niv_ID','asc')->get();
		$ocupaciones = Ocupacion::all()->lists('Ocu_Ocupacion');
		$instituciones = Institucion::all()->lists('Ins_Nombre');
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
		// dd($areas_especialidad);
		return view('formulario.index')->with('paises', json_encode($paises))->with('nacionalidades', json_encode($nacionalidades))->with('areas_especialidad', json_encode($areas_especialidad))->with('instituciones', json_encode($instituciones))->with('enfasis', $enfasis)->with('ocupaciones', json_encode($ocupaciones))->with('grados_academicos', $grados_academicos)->with('niveles_idioma', $niveles_idioma)->with('user', $user);
	}

	public function postIndex(CrearFormularioRequest $request)
	{
		$user = User::find(Auth::user()->Usu_ID);
		// Informacion Personal
		$user->formulario->IPe_Nombre = $request->nombre;
		$user->formulario->IPe_Apellido = $request->apellidos;
		$user->formulario->IPe_Genero = $request->genero;
		$user->formulario->IPe_Pasaporte = $request->id;

		// Archivo adjunto de la cédula o pasaporte
		if ($request->hasFile('id_file')) {
            $file = $request->file('id_file');
	        $name_file = $file->getClientOriginalName();
	        // dd($file->getClientMimeType() );
	        $trozos = explode(".", $name_file);
	        $extension = end($trozos);
	        $id_filename = $user->Usu_Nombre.'_'.rand(10, 99999999).'.'.$file->getClientOriginalName();
	        \Illuminate\Support\Facades\Request::file('id_file')->move($this->destinationPath.'/images/', $id_filename);
            $user->formulario->informacion_aspirante->Asp_Pasaporte_Adj = $id_filename;
        }

        // Fotografía adjunta del aspirante
		if ($request->hasFile('photo_file')) {
            $file = $request->file('photo_file');
	        $name_file = $file->getClientOriginalName();
	        // dd($file->getClientMimeType() );
	        $trozos = explode(".", $name_file);
	        $extension = end($trozos);
	        $id_filename = $user->Usu_Nombre.'_'.rand(10, 99999999).'.'.$file->getClientOriginalName();
	        \Illuminate\Support\Facades\Request::file('photo_file')->move($this->destinationPath.'/images/', $id_filename);
            $user->formulario->informacion_aspirante->Asp_Fotografia = $id_filename;
        }

		// Revisa si la fecha de nacimiento es enviada
		$fecha_nacimiento = $request->fecha_nacimiento;
		if(!empty($fecha_nacimiento)){
			$date_obj = date_create_from_format('d/m/Y',$fecha_nacimiento);
			$date = date_format($date_obj, 'Y-m-d');

			$user->formulario->IPe_Fecha_Nac = $date;
		}

		$nacionalidad = $request->nacionalidad;
		if(!empty($nacionalidad)){
			// Consulta a la base de datos si el país existe
			$nacionalidad = Nacionalidad::where('Nac_Nombre', '=', $request->nacionalidad)->first();
			if(is_null($nacionalidad)){
				// Si la nacionaidad no existe, regresa a la página anterior con los errores
				return redirect()->back()->withErrors(['La nacionaidad no existe']);
			}
			// Guarda el ID del país de residencia en la tabla del aspirante
			$user->formulario->informacion_aspirante->Asp_ID_Nac = $nacionalidad->Nac_ID; //ID de la tabla GEN_Pais
		}
		$user->formulario->IPe_Telefono = $request->telefono;
		$user->formulario->IPe_Fax = $request->fax;

		$email = $request->email;
		$email2 = $request->email2;
		if(!empty($email)){
			if($user->formulario->emails->isEmpty()){
				$email = new Email();
				$email->Email_Email = $request->email;
				$user->formulario->emails()->save($email);
			}
			else{
				$email = Email::find($user->formulario->emails()->first()->Email_ID);
				if($email->Email_Email != $request->email){
					$email->Email_Email = $request->email;
					$email->save();
				}
			}
		}
		if(!empty($email2)){
			if($user->formulario->emails->isEmpty()){
				$email = new Email();
				$email->Email_Email = $request->email;
				$user->formulario->emails()->save($email);
			}
			else{
				if(!empty($user->formulario->emails[1])){
					$email = Email::find($user->formulario->emails[1]->Email_ID);
					$email->Email_Email = $request->email2;
					$email->save();
				}
				else{
					$email = new Email();
					$email->Email_Email = $request->email2;
					$user->formulario->emails()->save($email);
				}
			}
		}
		else{
			if($user->formulario->emails()->count() > 1){
				Email::destroy($user->formulario->emails[1]->Email_ID);
			}
		}

		// Informacion del Aspirante
		$user->formulario->informacion_aspirante->Asp_Lugar_Nac = $request->lugar_nacimiento;
		$enfasis = $request->enfasis;
		if(!empty($enfasis)){
			$user->formulario->informacion_aspirante->Asp_ID_Enfasis = $request->enfasis;
		}
		// Area de interés para desarrollar el tema de investigación
		$user->formulario->informacion_aspirante->Asp_Area_Interes = $request->area_investigacion;

		$user->formulario->informacion_aspirante->save();


		// Direccion Actual del Aspirante
		$pais_residencia = $request->pais_residencia;
		if(!empty($pais_residencia)){
			// Consulta a la base de datos si el país existe
			$pais_residencia = Pais::where('Pais_Nombre', '=', $request->pais_residencia)->first();
			if(is_null($pais_residencia)){
				// Si el país no existe, regresa a la página anterior con los errores
				return redirect()->back()->withErrors(['El país de residencia no existe']);
			}
			// Guarda el ID del país de residencia en la tabla del aspirante
			$user->formulario->informacion_aspirante->direccion_actual->DiA_ID_Pais = $pais_residencia->Pais_ID; //ID de la tabla GEN_Pais

		}
		$user->formulario->informacion_aspirante->direccion_actual->DiA_Ciudad = $request->ciudad;
		$user->formulario->informacion_aspirante->direccion_actual->DiA_Cod_Postal = $request->codigo_postal;
		$user->formulario->informacion_aspirante->direccion_actual->DiA_Dir_Corresp = $request->direccion_correspondencia;

		$user->formulario->informacion_aspirante->direccion_actual->save();
		// Fin de la direccion actual
		$user->formulario->save();
		// Fin de la Información personal del aspirante
		if($user->formulario->formularioEstaLLeno() === true){
			$message = 'El formulario esta lleno';
			return redirect()->back()->withInput()->with('successMessage', [$message]);
		}
		$message = 'Sus datos han sido actualizados.';
		return redirect()->back()->withInput()->with('successMessage', [$message]);
	}

	public function getPdfformulario(){
		$user = User::find(Auth::user()->Usu_ID);
    	$html = view('formulario.pdf')->with('user',$user)->render();
    	$pdf = \PDF::load($html, 'Letter', 'portrait');
	    return $pdf->show();
        // return $this->pdf
        //     ->load($html, 'Letter', 'portrait')
        //     ->show();
	}
	public function getDocFormulario(){
		$user = User::find(Auth::user()->Usu_ID);
		return view('formulario.doc')->with('user',$user);
	}

	public function postEnviarFormulario(){
		$user = User::find(Auth::user()->Usu_ID);
		$user->formulario->informacion_aspirante->Asp_Estado_Formulario = "Enviado";
		$user->formulario->informacion_aspirante->save();
		$message = 'El formulario ha sido enviado con éxito.';
		return redirect()->back()->withInput()->with('successMessage', [$message]);
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

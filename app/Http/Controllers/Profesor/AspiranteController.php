<?php namespace App\Http\Controllers\Profesor;

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
use Vsmoraes\Pdf\Pdf;

// CARBON
use Carbon\Carbon;

// REQUESTS
use App\Http\Requests;
use App\Http\Requests\CrearFormularioRequest;

// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

class AspiranteController extends Controller {

	private $destinationPath = "";
	private $pdf;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Pdf $pdf)
	{
		$this->pdf = $pdf;
		$this->middleware('auth');
		$this->destinationPath = public_path().'/storage';
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($Asp_ID)
	{
		$user = User::find($Asp_ID);
		return view('profesor.aspirante.index')->with('user', $user);
	}

	public function postIndex(CrearFormularioRequest $request)
	{
		//
	}

	public function getPdfformulario(){
		$user = User::find(Auth::user()->Usu_ID);
    	$html = view('formulario.pdf')->with('user',$user)->render();
        return $this->pdf
            ->load($html, 'Letter', 'portrait')
            ->show();
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

<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class CrearRecomendacionesRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$estado_formulario = Auth::user()->formulario->informacion_aspirante->Asp_Estado_Formulario;
		if ($estado_formulario == "No enviado" || $estado_formulario == "Incompleto"){
			return true;
		}
		else{
			return false;
		}
	}

	public function forbiddenResponse(){
		return redirect()->back()->withInput()->withErrors([ trans('alert.alert_form.errors.already_been_sent')]);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'nombre1' => 'string|max:100',
			'direccion1' => 'string|max:250',
			'telefono1' => 'max:20',
			'fax1' => 'max:20',
			'email1' => 'email|max:50',
			'posicion1' => 'string|max:150',
			'archivo_recomendacion1' => 'image|max:3072',

			'nombre2' => 'string|max:100',
			'direccion2' => 'string|max:250',
			'telefono2' => 'max:20',
			'fax2' => 'max:20',
			'email2' => 'email|max:50',
			'posicion2' => 'string|max:150',
			'archivo_recomendacion2' => 'image|max:3072'
		];
	}

}

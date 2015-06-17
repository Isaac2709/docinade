<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class CrearBibliotecaProcesamientoDatosRequest extends Request {

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
		$rules = [];
		foreach($this->request->get('biblioteca') as $key => $val)
		{
			$rules['biblioteca.'.$key] = 'required|string|max:250';
		}
		foreach($this->request->get('procesamiento_datos') as $key => $val)
		{
			$rules['procesamiento_datos.'.$key] = 'required|string|max:100';
		}
		return $rules;
	}

}

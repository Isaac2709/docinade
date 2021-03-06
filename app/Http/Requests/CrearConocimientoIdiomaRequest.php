<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class CrearConocimientoIdiomaRequest extends Request {

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
		foreach($this->request->get('idioma') as $key => $val)
		{
			$rules['idioma.'.$key] = 'string|max:30';
		}
		foreach($this->request->get('nivelEscritura') as $key => $val)
		{
			$rules['nivelEscritura.'.$key] = 'exists:ASP_Nivel,Niv_ID';
		}
		foreach($this->request->get('nivelLectura') as $key => $val)
		{
			$rules['nivelLectura.'.$key] = 'exists:ASP_Nivel,Niv_ID';
		}
		foreach($this->request->get('nivelCoversacional') as $key => $val)
		{
			$rules['nivelCoversacional.'.$key] = 'exists:ASP_Nivel,Niv_ID';
		}
		foreach($this->file('archivo') as $key => $val)
		{
			$rules['archivo.'.$key] = 'image|max:3072';
		}
		return $rules;
	}

}

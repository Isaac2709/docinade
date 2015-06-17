<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class CrearPropuestaTesisRequest extends Request {

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
			'titulo_propuesta' => 'string|max:250',
			'definicion' => 'string|max: 65535',
			'marco_teorico' => 'string|max:16777214',
			'objetivos' => 'string|max:16777214',
			'metodologia' => 'string|max: 65535',
			'bibliografia' => 'string|max:16777214',
			'adjunto' => 'mimes:doc,docx,pdf,odt|max:3072',
		];
	}

}

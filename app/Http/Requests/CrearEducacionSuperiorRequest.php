<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;
use Auth;

class CrearEducacionSuperiorRequest extends Request {

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
		// dd($this->request);
		foreach($this->request->get('institucion') as $key => $val)
		{
			$rules['institucion.'.$key] = 'required';
		}
		foreach($this->request->get('añoG') as $key => $val)
		{
			$rules['añoG.'.$key] = 'integer|max:'.Carbon::now()->format('Y');
		}
		foreach($this->request->get('pais') as $key => $val)
		{
			$rules['pais.'.$key] = 'required|exists:GEN_Pais,Pais_Nombre';
		}
		foreach($this->request->get('gradoA') as $key => $val)
		{
			$rules['gradoA.'.$key] = 'required|exists:GEN_Grado_Acad,Gra_ID';
		}
		foreach($this->request->get('area_especialidad') as $key => $val)
		{
			$rules['area_especialidad.'.$key] = 'required';
		}
		return $rules;
	}

}

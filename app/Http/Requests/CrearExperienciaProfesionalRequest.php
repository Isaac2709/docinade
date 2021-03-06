<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;
use Auth;

class CrearExperienciaProfesionalRequest extends Request {

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
		// $array_annios_fin = $this->request->get('annio_fin');
		// if(is_null($array_annios_fin)){
		// 	$array_annios_fin = [];
		// }
		// array_unshift( $array_annios_fin, Carbon::now()->format('Y') );
		// $this->request->set('annio_fin', $array_annios_fin);
		$array = $this->request;
		foreach($this->request->get('empresa') as $key => $val)
		{
			$rules['empresa.'.$key] = 'string|max:250';
		}
		foreach($this->request->get('ocupacion') as $key => $val)
		{
			$rules['ocupacion.'.$key] = 'max:150';
		}
		foreach($this->request->get('annio_inicio') as $key => $val)
		{
			$rules['annio_inicio.'.$key] = 'integer|max:'.Carbon::now()->format('Y');

		}
		// $pos = 0;
		foreach($this->request->get('annio_fin') as $key => $val)
		{
			$rules['annio_fin.'.$key] = 'integer|max:'.Carbon::now()->format('Y').'|min:'.$array->get('annio_inicio')[$key];
			// $pos = $pos + 1;
		}
		// dd($this->request);
		// dd($rules);
		return $rules;
	}

}

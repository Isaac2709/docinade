<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class CrearExperienciaInvestigacionRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [];
		foreach($this->request->get('nombre') as $key => $val)
		{
			$rules['nombre.'.$key] = 'string|max:400';
		}
		foreach($this->request->get('lugar') as $key => $val)
		{
			$rules['lugar.'.$key] = 'string|max:250';
		}
		foreach($this->request->get('año') as $key => $val)
		{
			$rules['año.'.$key] = 'integer|max:'.Carbon::now()->format('Y');
		}
		return $rules;
	}

}

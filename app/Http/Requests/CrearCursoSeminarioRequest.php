<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class CrearCursoSeminarioRequest extends Request {

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
		foreach($this->request->get('actividad') as $key => $val)
		{
			$rules['actividad.'.$key] = 'required|string|max:250';
		}
		foreach($this->request->get('annio') as $key => $val)
		{
			$rules['annio.'.$key] = 'integer|max:'.Carbon::now()->format('Y');
		}
		foreach($this->request->get('institucion') as $key => $val)
		{
			$rules['institucion.'.$key] = 'string|max:250';
		}
		foreach($this->request->get('lugar') as $key => $val)
		{
			$rules['lugar.'.$key] = 'string|max:250';
		}
		return $rules;
	}

}

<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class CrearPublicacionRequest extends Request {

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
		foreach($this->request->get('titulo_publicacion') as $key => $val)
		{
			$rules['titulo_publicacion.'.$key] = 'string|max:400';
		}
		foreach($this->request->get('titulo_medio_publicacion') as $key => $val)
		{
			$rules['titulo_medio_publicacion.'.$key] = 'string|max:250';
		}
		foreach($this->request->get('pais') as $key => $val)
		{
			$rules['pais.'.$key] = 'exists:GEN_Pais,Pais_Nombre';
		}
		foreach($this->request->get('annio') as $key => $val)
		{
			$rules['annio.'.$key] = 'integer|max:'.Carbon::now()->format('Y');
		}
		return $rules;
	}

}

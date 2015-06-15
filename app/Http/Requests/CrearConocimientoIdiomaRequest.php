<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrearConocimientoIdiomaRequest extends Request {

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

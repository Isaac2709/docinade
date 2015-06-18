<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrearProfesorRequest extends Request {

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
		return [
			'nombre_completo' => 'required|max:255',
			'email' => 'required|email|max:255|unique:Gen_Usuario',
			'password' => 'required|confirmed|min:6',
		];
	}

}

<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class CrearFormularioRequest extends Request {

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
			'nombre' => 'string|max:50',
			'apellidos' => 'string|max:50',
			'genero' => 'in:M,F',
			'id' => 'max:25',
			'id_file' => 'mimes:jpeg,png,bmp,gif,pdf|max:3072',
			'photo_file' => 'image|max:1024',
			'fecha_nacimiento' => 'date_format:"d/m/Y"|before:'.Carbon::now()->format('d/m/Y'),
			'nacionalidad' => 'exists:ASP_Nacionalidad,Nac_Nombre',
			'telefono' => 'max:20',
			'fax' => 'max:20',
			'email' => 'email|max:50',//.$this->route->getParameter('users');
			'email2' => 'email|max:50',
			'lugar_nacimiento' => 'string|max:100',
			'enfasis' => 'exists:ASP_Enfasis,Enf_ID',
			'pais_residencia' => 'exists:GEN_Pais,Pais_Nombre',
			'ciudad' => 'max:30',
			'codigo_postal' => 'max:12',
			'direccion_correspondencia' => 'max:250'
		];
	}

}

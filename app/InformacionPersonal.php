<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InformacionPersonal extends Model {

	protected $table = 'GEN_Info_Personal';

	protected $primaryKey = 'IPe_ID';

	/**
	* Set the variables timestamps to false
	*
	* @var string
	*/
	public $timestamps = false;

	// protected $fillable = [ 'IPe_ID', 'IPe_Nombre', 'IPe_Apellido', 'IPe_Genero', 'IPe_Pasaporte',
	// 						'IPe_Fecha_Nac', 'IPe_ID_PaisRes', 'IPe_Telefono', 'IPe_Fax'];

	public function formulario(){
		return $this->belongsTo('Formulario', 'ASP_Aspirante');
	}
}

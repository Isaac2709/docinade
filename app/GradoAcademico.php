<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GradoAcademico extends Model {
	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'GEN_Grado_Acad';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'Gra_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected  = [ 'Gra_ID', 'Gra_Nombre'];

	public function educacion_superior(){
		return $this->hasMany('App\EducacionSuperior', 'Sup_ID_Grado_Acad');
	}
}

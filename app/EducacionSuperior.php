<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EducacionSuperior extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Educ_Sup';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'Sup_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'Sup_ID', 'Sup_ID_Asp', 'Sup_ID_Institucion', 'Sup_ID_Pais','Sup_ID_Area_Esp','Sup_ID_Grado_Acad','Sup_Anio_Grad','Sup_Adjunto'];

	public function aspirante(){
		return $this->belongsTo('App\InformacionAspirante', 'Sup_ID_Asp');
	}

}

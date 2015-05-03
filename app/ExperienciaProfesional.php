<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienciaProfesional extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Exp_Profesional';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'Pro_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'Pro_ID', 'Pro_ID_Asp', 'Pro_Institucion', 'Pro_ID_Ocupacion', 'Pro_Anio_Inicio', 'Pro_Actual', 'Pro_Anio_Fin'];

	public function informacion_aspirante(){
		return $this->belongsTo('App\InformacionAspirante', 'Pro_ID_Asp');
	}

	public function ocupacion(){
		return $this->belongsTo('App\Ocupacion', 'Pro_ID_Ocupacion');
	}

}

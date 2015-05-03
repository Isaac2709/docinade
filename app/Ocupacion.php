<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'GEN_Ocupacion';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'Ocu_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'Ocu_ID', 'Ocu_Ocupacion'];

	public function experiencia_profesional(){
		return $this->hasOne('App\ExperienciaProfesional', 'Pro_ID_Ocupacion');
	}

}

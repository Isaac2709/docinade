<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'GEN_Institucion';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'Ins_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'Ins_ID', 'Ins_Nombre'];

	public function experiencia_investigacion(){
		return $this->hasOne('App\ExperienciaInvestigacion', 'Inv_ID');
	}

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Nacionalidad';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'Nac_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'Nac_Nombre']

	public function informacion_aspirante(){
		return $this->hasOne('App\InformacionAspirante', 'Nac_ID');
	}

}

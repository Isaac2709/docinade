<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EducacionDistancia extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Edu_Distancia';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'EDi_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'EDi_ID', 'EDi_ID_Asp', 'EDi_Descripcion'];

	/**
	 * Relacion de pertenencia de uno a uno entre los modelos EducacionDistancia y
	 * InformacionAspirante
	 * @return [arrayEloquent] [El modelo InformacionAspirante al que pertenece
	 *                             	EducacionDistancia]
	 */
	public function informacion_aspirante(){
		return $this->belongsTo('App\InformacionAspirante', 'EDi_ID_Asp');
	}

}

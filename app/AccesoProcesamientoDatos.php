<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AccesoProcesamientoDatos extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Proc_Datos';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'PDa_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'PDa_ID', 'PDa_ID_Asp', 'PDa_Nombre'];

	/**
	 * Relacion de pertenencia de uno a uno entre los modelos AccesoProcesamientoDatos
	 * y InformacionAspirante
	 * @return [arrayEloquent] 		[El modelo InformacionAspirante al que pertenece
	 *                               AccesoProcesamientoDatos]
	 */
	public function informacion_aspirante(){
		return $this->belongsTo('App\InformacionAspirante', 'PDa_ID_Asp');
	}

}

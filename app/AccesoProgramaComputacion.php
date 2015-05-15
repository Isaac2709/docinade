<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AccesoProgramaComputacion extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Progra_Compu';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'Prog_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'Prog_ID', 'Prog_ID_Asp', 'Prog_Nombre'];

	/**
	 * Relacion de pertenencia de uno a uno entre los modelos AccesoProgramaComputacion
	 * y InformacionAspirante
	 * @return [arrayEloquent] 		[El modelo InformacionAspirante al que pertenece
	 *                               AccesoProgramaComputacion]
	 */
	public function InformacionAspirante(){
		return $this->belongsTo('App\InformacionAspirante', 'Prog_ID_Asp');
	}

}

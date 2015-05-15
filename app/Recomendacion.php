<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Recomendacion extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Recomendacion';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'Rec_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'Rec_ID', 'Rec_ID_Asp', 'Rec_Nombre_Completo', 'Rec_Direccion', 'Rec_Telefono', 'Rec_Fax', 'Rec_ID_Email', 'Rec_ID_Ocupacion', 'Rec_Adjunto'];

	/**
	 * Relacion de pertenencia de uno a uno entre los modelos Recomendacion e
	 *  InformacionAspirante
	 * @return [arrayEloquent] [El modelo InformacionAspirante al que pertenece Recomendacion]
	 */
	public function informacion_aspirante(){
		return $this->belongsTo('App\InformacionAspirante', 'Rec_ID_Asp');
	}

	/**
	 * Relacion de pertenencia de uno a uno entre los modelos Email y Recomendacion
	 * @return [arrayEloquent] 		[El modelo Email al que pertenece Recomendacion]
	 */
	public function email(){
		return $this->belongsTo('App\Email', 'Rec_ID_Email');
	}

}

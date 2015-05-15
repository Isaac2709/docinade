<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PropuestaTesis extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Prop_Tesis';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'PTe_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'PTe_ID', 'PTe_Titulo', 'PTe_Definicion', 'PTe_Marco_Teorico', 'PTe_Metodologia', 'PTe_Adjunto', 'PTe_Objetivos', 'PTe_Bibliografia'];

	/**
	 * Relacion uno a uno entre los modelos PropuestaTesis y Bibliografia
	 * @return [arrayEloquent] [El modelo Bibliografia que pertenece a PropuestaTesis]
	 */
	// public function Bibliografia(){
	// 	return $this->hasOne('App\Bibliografia', 'Bib_ID_Prop_Tesis');
	// }

	/**
	 * Relacion uno a uno entre los modelos PropuestaTesis y InformacionAspirante
	 * @return [arrayEloquent] [El modelo InformacionAspirante que pertenece a PropuestaTesis]
	 */
	public function InformacionAspirante(){
		return $this->hasOne('App\InformacionAspirante', 'ID_Prop_Tesis');
	}

}

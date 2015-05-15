<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ConocimientoIdioma extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Idioma';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'Idm_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'Idm_ID', 'Idm_ID_Asp', 'Idm_Idioma', 'Idm_ID_Niv_Escr','Idm_ID_Niv_Lect', 'Idm_ID_Niv_Conv', 'Idm_Posee_MCE', 'Idm_Adjunto'];

	/**
	 * Relacion de pertenencia de uno a uno entre los modelos ConocimientoIdioma y
	 * InformacionAspirante
	 * @return [arrayEloquent] [El modelo InformacionAspirante al que pertenece ConocimientoIdioma]
	 */
	public function informacion_aspirante(){
		return $this->belongsTo('App\InformacionAspirante', 'Idm_ID_Asp');
	}

	/**
	 * Relacion uno a uno entre los modelos ConocimientoIdioma y NivelIdioma
	 * @return [arrayEloquent] [El modelo NivelIdioma que pertenece al ConocimientoIdioma]
	 */
	public function nivel_idioma_escritura(){
		return $this->hasOne('App\NivelIdioma', 'Idm_ID_Niv_Escr');
	}

	/**
	 * Relacion uno a uno entre los modelos ConocimientoIdioma y NivelIdioma
	 * @return [arrayEloquent] [El modelo NivelIdioma que pertenece al ConocimientoIdioma]
	 */
	public function nivel_idioma_lectura(){
		return $this->hasOne('App\NivelIdioma', 'Idm_ID_Niv_Lect');
	}

	/**
	 * Relacion uno a uno entre los modelos ConocimientoIdioma y NivelIdioma
	 * @return [arrayEloquent] [El modelo NivelIdioma que pertenece al ConocimientoIdioma]
	 */
	public function nivel_idioma_conversacional(){
		return $this->hasOne('App\NivelIdioma', 'Idm_ID_Niv_Conv');
	}
}

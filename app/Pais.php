<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model {

	/**
	 * Set a custom name to the table model
	 * @var string
	 */
	protected $table = 'GEN_Pais';

	/**
	 * Set a custom variable primary key
	 * @var string
	 */
	protected $primaryKey = 'Pais_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	 * Specifies which attributes should be mass-assignable.
	 * @var string
	 */
	//protected $fillable = [ 'Pais_Nombre']

	public function direcciones(){
		return $this->hasMany('App\DireccionActual', 'DiA_ID_Pais');
	}

	// public function paises(){
	// 	return $this->hasMany('App\Pais', 'Sup_ID_Pais');
	// }

	public function publicaciones(){
		return $this->hasMany('App\Publicacion', 'Pub_ID_Pais');
	}
}

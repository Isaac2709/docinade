<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'GEN_Publicacion';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'Pub_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'Pub_ID', 'Pub_ID_Asp', 'Pub_Titulo', 'Pub_Medio', 'Pub_ID_Pais', 'Pub_Anio', 'Pub_Enlace'];

	public function informacion_aspirante(){
		return $this->belongsTo('App\InformacionAspirante', 'Pub_ID_Asp');
	}

	public function pais(){
		return $this->belongsTo('App\Pais', 'Pub_ID_Pais');
	}

}

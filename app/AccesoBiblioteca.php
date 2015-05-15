<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AccesoBiblioteca extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Biblioteca';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'Bib_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'Bib_ID', 'Bib_ID_Asp', 'Bib_Nombre'];

	/**
	 * Relacion de pertenencia de uno a uno entre los modelos AccesoBiblioteca y InformacionAspirante
	 * @return [arrayEloquent] 		[El modelo InformacionAspirante al que pertenece AccesoBiblioteca]
	 */
	public function informacion_aspirante(){
		return $this->belongsTo('App\InformacionAspirante', 'Bib_ID_Asp');
	}

}

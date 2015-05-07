<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoSeminario extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Curso_Sem';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'CSe_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected  $fillable = [ 'CSe_ID', 'CSe_ID_Asp', 'CSe_Actividad', 'CSe_Institucion','CSe_Lugar', 'CSe_Annio'];

	public function informacion_aspirante(){
		return $this->belongsTo('App\InformacionAspirante', 'CSe_ID_Asp');
	}

}

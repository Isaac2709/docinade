<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienciaInvestigacion extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Exp_Invest';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'Inv_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'Inv_ID_Asp', 'Inv_Proyecto', 'Inv_ID_Institucion', 'Inv_Lugar', 'Inv_Anio'];

	public function informacion_aspirante(){
		return $this->belongsTo('App\InformacionAspirante', 'Inv_ID_Asp');
	}

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionActual extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Dir_Actual';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'DiA_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'DiA_ID_Pais', 'DiA_Ciudad', 'DiA_Cod_Postal', 'DiA_Dir_Corresp'];

	public function informacion_aspirante(){
		return $this->hasOne('App\InformacionAspirante', 'Asp_ID_Dir_Actual');
	}

}

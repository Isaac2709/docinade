<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaEspecialidad extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Area_Esp';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'Esp_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected  $fillable = [ 'Esp_ID', 'Esp_Area'];

	public function educacion_superior(){
		return $this->hasMany('App\EducacionSuperior', 'Sup_ID_Area_Esp');
	}

}

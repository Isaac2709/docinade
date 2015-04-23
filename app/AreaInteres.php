<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaInteres extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Area_Interes';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'Area_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'Area_Nombre'];

	public function informacion_aspirante(){
		return $this->hasOne('App\InformacionAspirante', 'Asp_ID');
	}
}

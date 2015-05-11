<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelIdioma extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Nivel';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'Niv_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'Niv_ID', 'Niv_Nombre'];

}

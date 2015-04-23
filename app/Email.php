<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'GEN_Email';

	/**
	* Set a custom variable primary key
	* @var string
	*/
	protected $primaryKey = 'Email_ID';

	/**
	* Set the variables timestamps to false
	* @var string
	*/
	public $timestamps = false;

	/**
	* Specifies which attributes should be mass-assignable.
	* @var string
	*/
	// protected $fillable = [ 'Email_ID', 'Email_ID_InfoPer', 'Email_Email'];

	public function formulario(){
		return $this->belongsTo('App\Formulario', 'Email_ID_InfoPer');
	}

}

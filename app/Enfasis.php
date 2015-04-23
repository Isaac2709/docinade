<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfasis extends Model {

	protected $table = 'ASP_Enfasis';

	protected $primaryKey = 'Enf_ID';

	/**
	* Set the variables timestamps to false
	*
	* @var string
	*/
	public $timestamps = false;

	// protected $fillable = [ 'Enf_ID', 'Enf_Nombre'];

	public function aspirante(){
		return $this->belongsTo('App\User', 'Usu_ID');
	}

}

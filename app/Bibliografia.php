<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bibliografia extends Model {

	/**
	* Set a custom name to the table model
	* @var string
	*/
	protected $table = 'ASP_Bibliografia';

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
	// protected $fillable = [ 'Bib_ID', 'Bib_ID_Prop_Tesis', 'Bib_Bibliografia'];

	/**
	 * Relacion de pertenencia de uno a uno entre los modelos Bibliografia y PropuestaTesis
	 * @return [arrayEloquent] [El modelo PropuestaTesis al que pertenece Bibliografia]
	 */
	public function propuesta_tesis(){
		return $this->belongsTo('App\PropuestaTesis', 'Bib_ID_Prop_Tesis');
	}

}

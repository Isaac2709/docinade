<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model {

	protected $table = 'GEN_Info_Personal';

	protected $primaryKey = 'IPe_ID';

	/**
	* Set the variables timestamps to false
	*
	* @var string
	*/
	public $timestamps = false;



	// protected $fillable = [ 'IPe_ID', 'IPe_Nombre', 'IPe_Apellido', 'IPe_Genero', 'IPe_Pasaporte',
	// 						'IPe_Fecha_Nac', 'IPe_ID_PaisRes', 'IPe_Telefono', 'IPe_Fax'];

	public function aspirante(){
		return $this->belongsTo('User', 'GEN_ID_Usuario');
	}

	public function informacion_aspirante(){
		return $this->hasOne('User', 'GEN_ID_Usuario');
	}

	public function formularioTieneInformacionPersonal()
    {
        return ! is_null(
            \DB::table('GEN_Info_Personal')
              	->where('GEN_ID_Usuario', '=',$this->Usu_ID)
              	->first()
        );
    }
}

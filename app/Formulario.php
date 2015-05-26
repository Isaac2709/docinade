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
		return $this->belongsTo('App\User', 'Usu_ID');
	}

	public function informacion_aspirante(){
		return $this->hasOne('App\InformacionAspirante', 'Asp_ID_InfoPer');
	}

	public function formularioTieneInformacionPersonal()
    {
        return ! is_null(
            \DB::table('GEN_Info_Personal')
              	->where('GEN_ID_Usuario', '=',$this->Usu_ID)
              	->first()
        );
    }

    public function emails(){
    	return $this->hasMany('App\Email', 'Email_ID_InfoPer');
    }

    public function formularioTieneEmail($input_email){
    	return !is_null($this->emails()->where('Email_Email', '=', $input_email)->first());
    }

    public function scopeFormularioEstaLLeno(){
        $id = $this->informacion_aspirante->Asp_ID;
        $data = \DB::select("select enviarForm(".$id.") as 'Resultado'");
        // dd($data);
        if($data[0]->Resultado === 'Y'){
            if($this->informacion_aspirante->Asp_Estado_Formulario != 'No enviado'){
                $this->informacion_aspirante->Asp_Estado_Formulario = "No enviado";
                $this->informacion_aspirante->save();
            }
        	return true;
        }
        else{
            if($this->informacion_aspirante->Asp_Estado_Formulario != 'Incompleto'){
                $this->informacion_aspirante->Asp_Estado_Formulario = "Incompleto";
                $this->informacion_aspirante->save();
            }
            return $data[0]->Resultado;
        }
    }

    public function scopeConsultarDatosFaltantes(){
        $id = $this->informacion_aspirante->Asp_ID;
        \DB::connection()->getPdo()->setAttribute(\PDO::ATTR_EMULATE_PREPARES, true);
        return \DB::select('Call consultarEstado(?)', array($id));

    }
}

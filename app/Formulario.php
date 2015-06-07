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

    public function scopeDatosFaltantes(){
        $id = $this->informacion_aspirante->Asp_ID;
        \DB::connection()->getPdo()->setAttribute(\PDO::ATTR_EMULATE_PREPARES, true);
        return \DB::select('Call consultarEstado(?)', array($id));

    }

    public function scopePorcentajeFinalizado(){
        $datos_faltantes = $this->datosFaltantes();
        $cant_datos_faltantes = count($datos_faltantes) - 1; // Le quito 1 por que siempre devuelve una fila para el total de campos
        $total_datos = $this->totalDatos($datos_faltantes);
        $porcentaje = 100 - (($cant_datos_faltantes * 100) / $total_datos);
        if($porcentaje === 0)
            return 1;
        return round($porcentaje);

    }

    public function scopeConsultarDatosFaltantes(){
        $array = $this->datosFaltantes();
        $array_secciones = $this->secciones($array);
        $array_final = array();
        foreach ($array_secciones as $seccion) {
            $array_temp = array();
            foreach ($array as $var) {
                if($var->Res_Seccion == $seccion){
                    $array_temp[] = $var;
                }
            }
            $grupo_dato = new \stdClass();
            $grupo_dato->seccion = $seccion;
            $grupo_dato->campos_faltantes = $array_temp;
            $array_final[] = $grupo_dato;
        }
        return $array_final;
    }

    public function secciones($array){
        $array_secciones=array();
        foreach ($array as $var) {
            if($var->Res_Seccion != null){
                $array_secciones[] = $var->Res_Seccion;
            }
            else{
                if($var->Res_Campo != "Total"){
                    $array_secciones[] = $var->Res_Campo;
                }
            }
        }
        return array_unique($array_secciones);
    }

     public function totalDatos($array){
        foreach ($array as $var) {
            if($var->Res_Campo == "Total"){
                return $var->Res_Cant;
            }
        }
        return 0;
    }

    function pertenece($dato_faltante, $segmento){
        if($dato_faltante->Res_Seccion == $segmento){
            return true;
        }
        return false;
    }
}

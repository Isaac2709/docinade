<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InformacionAspirante extends Model {

	protected $table = 'ASP_Aspirante';

	protected $primaryKey = 'Asp_ID';

	/**
	* Set the variables timestamps to false
	*
	* @var string
	*/
	public $timestamps = false;

	// protected $fillable = [ 'Asp_ID', 'Asp_Fecha_Envio', 'Asp_Fotografia', 'Asp_Pasaporte_Adj',
	// 						'Asp_ID_InfoPer', 'Asp_Lugar_Nac', 'Asp_ID_Nac', 'Asp_ID_Enfasis',
	// 						'Asp_ID_Dir_Actual', 'Asp_ID_Area_Interes', 'Asp_Acceso_Biblioteca',
	// 						'Asp_Acceso_Proc_DatoS', 'Asp_Acceso_Windows', 'Asp_Acceso_Email',
	// 						'Asp_Utilizacion_Progra_Comp', 'Asp_Conoc_Educacion_Dist',
	// 						'ID_Prop_Tesis', GEN_ID_Usuario];

	public function formulario(){
		return $this->belongsTo('Formulario', 'IPe_ID');
	}

	public function direccion_actual(){
		return $this->belongsTo('App\DireccionActual', 'Asp_ID_Dir_Actual');
	}

	public function area_interes(){
		return $this->belongsTo('App\AreaInteres', 'Asp_ID_Area_Interes');
	}

	public function nacionalidad(){
		return $this->belongsTo('App\Nacionalidad', 'Asp_ID_Nac');
	}

	public function experiencias_investigaciones(){
		return $this->hasMany('App\ExperienciaInvestigacion', 'Inv_ID_Asp');
	}

	public function scopeSeleccionarInvestigacionesAEliminar($query, $id_investigaciones){
		$investigaciones = $this->experiencias_investigaciones();
		foreach ($id_investigaciones as $id_investigacion) {
			$investigaciones = $investigaciones->where('Inv_ID', '!=', $id_investigacion);
		}
		return $investigaciones->get();
	}
}

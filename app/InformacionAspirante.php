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

	/**
	 * Relacion de pertenencia de uno a uno entre los modelos InformacionAspirante y Formulario
	 * @return [arrayEloquent] [El modelo Formulario al que pertenece InformacionAspirante]
	 */
	public function formulario(){
		return $this->belongsTo('Formulario', 'IPe_ID');
	}

	/**
	 * Relacion de pertenencia de uno a uno entre los modelos InformacionAspirante y DireccionActual
	 * @return [arrayEloquent] [El modelo DireccionActual al que pertenece InformacionAspirante]
	 */
	public function direccion_actual(){
		return $this->belongsTo('App\DireccionActual', 'Asp_ID_Dir_Actual');
	}

	/**
	 * Relacion de pertenencia de uno a uno entre los modelos InformacionAspirante y AreaInteres
	 * @return [arrayEloquent] [El modelo AreaInteres al que pertenece InformacionAspirante]
	 */
	public function area_interes(){
		return $this->belongsTo('App\AreaInteres', 'Asp_ID_Area_Interes');
	}

	/**
	 * Relacion de pertenencia de uno a uno entre los modelos InformacionAspirante y AreaInteres
	 * @return [arrayEloquent] [El modelo AreaInteres al que pertenece InformacionAspirante]
	 */
	public function enfasis(){
		return $this->belongsTo('App\Enfasis', 'Asp_ID_Enfasis');
	}

	/**
	 * Relacion de pertenencia de uno a uno entre los modelos InformacionAspirante y Nacionalidad
	 * @return [arrayEloquent] [El modelo Nacionalidad al que pertenece InformacionAspirante]
	 */
	public function nacionalidad(){
		return $this->belongsTo('App\Nacionalidad', 'Asp_ID_Nac');
	}

	/**
	 * Relacion uno a muchos entre los modelos InformacionAspirante y ExperienciaInvestigacion
	 * @return [arrayEloquent] [Los modelos de ExperienciaInvestigacon que pertenecen a InformacionAspirante]
	 */
	public function experiencias_investigaciones(){
		return $this->hasMany('App\ExperienciaInvestigacion', 'Inv_ID_Asp');
	}

	/**
	 * Relacion uno a muchos entre los modelos InformacionAspirante y EducacionSuperior
	 * @return [arrayEloquent] [Los modelos de EducacionSuperior que pertenecen a InformacionAspirante]
	 */
	public function educacion_superior(){
		return $this->hasMany('App\EducacionSuperior', 'Sup_ID_Asp');
	}

	/**
	 * Devuelve las experiencias en investigaciones que se van a eliminar
	 * @param  [type] $query              	[description]
	 * @param  [array] $id_investigaciones 	[los id de las investigaciones que aun se mantienen]
	 * @return [arrayEloquent]            	[los modelos de las investigaciones que se van a eliminar]
	 */
	public function scopeSeleccionarInvestigacionesAEliminar($query, $id_investigaciones){
		$investigaciones = $this->experiencias_investigaciones();
		foreach ($id_investigaciones as $id_investigacion) {
			$investigaciones = $investigaciones->where('Inv_ID', '!=', $id_investigacion);
		}
		return $investigaciones->get();
	}

	/**
	 * Devuelve las experiencias en investigaciones que se van a eliminar
	 * @param  [type] $query              		[description]
	 * @param  [array] $id_educacion_superior 	[los id de las educaciones que aun se mantienen]
	 * @return [arrayEloquent]            		[los modelos de las educaciones que se van a eliminar]
	 */
	public function scopeSeleccionarEducacionSuperiorAEliminar($query, $id_educacion_superior){
		$educacion = $this->educacion_superior();
		foreach ($id_educacion_superior as $id_educacion) {
			$educacion = $educacion->where('Sup_ID', '!=', $id_educacion);
		}
		return $educacion->get();
	}




}

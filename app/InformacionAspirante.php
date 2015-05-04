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
	 * Relacion uno a muchos entre los modelos InformacionAspirante y ExperienciaProfesional
	 * @return [arrayEloquent] [Los modelos de ExperienciaProfesional que pertenecen a
	 * InformacionAspirante]
	 */
	public function experiencias_profesionales(){
		return $this->hasMany('App\ExperienciaProfesional', 'Pro_ID_Asp');
	}

	/**
	 * Relacion uno a muchos entre los modelos InformacionAspirante y Publicacion
	 * @return [arrayEloquent] [Los modelos de Publicacion que pertenecen a
	 * InformacionAspirante]
	 */
	public function publicaciones(){
		return $this->hasMany('App\Publicacion', 'Pub_ID_Asp');
	}

	/**
	 * Devuelve las experiencias en investigaciones que se van a eliminar
	 * @param  [type] $query              	[description]
	 * @param  [array] $id_investigaciones 	[los id de las investigaciones que aun se mantienen]
	 * @return [arrayEloquent]            	[los modelos de las investigaciones que se van a
	 * eliminar]
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
	 * @return [arrayEloquent]            		[los modelos de las educaciones que se van a
	 * eliminar]
	 */
	public function scopeSeleccionarEducacionSuperiorAEliminar($query, $id_educacion_superior){
		$educacion = $this->educacion_superior();
		foreach ($id_educacion_superior as $id_educacion) {
			$educacion = $educacion->where('Sup_ID', '!=', $id_educacion);
		}
		return $educacion->get();
	}

	/**
	 * Devuelve las experiencias profesionales que se van a eliminar
	 * @param  [type] $query              		[description]
	 * @param  [array] $id_experiencia_profesional 	[los id de las educaciones que aun se mantienen]
	 * @return [arrayEloquent]            		[los modelos de las educaciones que se van a
	 * eliminar]
	 */
	public function scopeSeleccionarExperienciaProfesionalAEliminar($query, $id_experiencias_profesionales){
		$experiencia_profesional = $this->experiencias_profesionales();
		foreach ($id_experiencias_profesionales as $id_experiencia_profesional) {
			$experiencia_profesional = $experiencia_profesional->where('Pro_ID', '!=', $id_experiencia_profesional);
		}
		return $experiencia_profesional->get();
	}

	/**
	 * Devuelve las publicaciones que se van a eliminar
	 * @param  [type] $query              		[description]
	 * @param  [array] $id_experiencia_profesional 	[los id de las educaciones que aun se mantienen]
	 * @return [arrayEloquent]            		[los modelos de las educaciones que se van a
	 * eliminar]
	 */
	public function scopeSeleccionarPublicacionesAEliminar($query, $id_publicaciones){
		$publicaciones = $this->publicaciones();
		foreach ($id_publicaciones as $id_publicacion) {
			$publicaciones = $publicaciones->where('Pub_ID', '!=', $id_publicacion);
		}
		return $publicaciones->get();
	}

	/**
	 * Ordena descendentemente las experiencias profesionales según el año de fin e inicio.
	 * @return [arrayEloquent] [Los modelos de ExperienciaProfesional que pertenecen a
	 * InformacionAspirante ordenados descendentemente]
	 */
	public function experiencias_profesionales_desc(){
		return $this->experiencias_profesionales()->orderBy('Pro_Anio_Fin', 'DESC')->orderBy('Pro_Anio_Inicio', 'DESC');
	}

	/**
	 * Ordena descendentemente las experiencias en investigacion según el año de las
	 * investigaciones.
	 * @return [arrayEloquent] [Los modelos de ExperienciaInvestigacion que pertenecen a
	 * InformacionAspirante ordenados descendentemente]
	 */
	public function experiencias_investigaciones_desc(){
		return $this->experiencias_investigaciones()->orderBy('Inv_Anio', 'DESC');
	}

	/**
	 * Ordena descendentemente las publicaciones del aspirante según el año de publicada.
	 * @return [arrayEloquent] [Los modelos de Publicacion que pertenecen a InformacionAspirante
	 * ordenados descendentemente]
	 */
	public function publicaciones_desc(){
		return $this->publicaciones()->orderBy('Pub_Anio', 'DESC');
	}


}

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
	 * Relacion uno a muchos entre los modelos InformacionAspirante y CursoSeminario
	 * @return [arrayEloquent] [Los modelos de CursoSeminario que pertenecen a
	 * InformacionAspirante]
	 */
	public function cursos_seminarios(){
		return $this->hasMany('App\CursoSeminario', 'CSe_ID_Asp');
	}

	/**
	 * Relacion uno a muchos entre los modelos InformacionAspirante y ConocimientoIdioma
	 * @return [arrayEloquent] [Los modelos de ConocimientoIdioma que pertenecen a
	 * InformacionAspirante]
	 */
	public function conocimiento_idiomas(){
		return $this->hasMany('App\ConocimientoIdioma', 'Idm_ID_Asp');
	}

	/**
	 * Relacion uno a muchos entre los modelos InformacionAspirante y AccesoBiblioteca
	 * @return [arrayEloquent] [Los modelos de AccesoBiblioteca que pertenecen a InformacionAspirante]
	 */
	public function acceso_bibliotecas(){
		return $this->hasMany('App\AccesoBiblioteca', 'Bib_ID_Asp');
	}

	/**
	 * Relacion uno a muchos entre los modelos InformacionAspirante y AccesoProcesamientoDatos
	 * @return [arrayEloquent] 		[Los modelos de AccesoProcesamientoDatos que pertenecen
	 *                                a InformacionAspirante]
	 */
	public function acceso_procesamiento_datos(){
		return $this->hasMany('App\AccesoProcesamientoDatos', 'PDa_ID_Asp');
	}

	/**
	 * Relacion uno a muchos entre los modelos InformacionAspirante y AccesoProgramaComputacion
	 * @return [arrayEloquent] [Los modelos de AccesoProgramaComputacion que pertenecen a InformacionAspirante]
	 */
	public function acceso_programas_computacionales(){
		return $this->hasMany('App\AccesoProgramaComputacion', 'Prog_ID_Asp');
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
	 * Devuelve las publicaciones que se van a eliminar
	 * @param  [type] $query              		[description]
	 * @param  [array] $id_cursos_seminarios 	[los id de las cursos o seminarios que aun se
	 *                                        	 mantienen]
	 * @return [arrayEloquent]            		[los modelos de los cursos o seminarios que
	 *                                           se van a eliminar]
	 */
	public function scopeSeleccionarCursosSeminariosAEliminar($query, $id_cursos_seminarios){
		$cursos_seminarios = $this->cursos_seminarios();
		foreach ($id_cursos_seminarios as $id_curso_seminario) {
			$cursos_seminarios = $cursos_seminarios->where('CSe_ID', '!=', $id_curso_seminario);
		}
		return $cursos_seminarios->get();
	}

	/**
	 * Devuelve los conocimientos de idiomas que se van a eliminar
	 * @param  [type]               			[description]
	 * @param  [array]$id_conocimiento_idiomas  [los id de las conocimientos de idiomas
	 *                                           que aun se mantienen]
	 * @return [arrayEloquent]            		[los modelos de los conocimientos de idiomas
	 *                                           que se van a eliminar]
	 */
	public function scopeSeleccionarConocimientoIdiomasAEliminar($query, $id_conocimiento_idiomas){
		$conocimiento_idiomas = $this->conocimiento_idiomas();
		foreach ($id_conocimiento_idiomas as $id_conocimiento_idioma) {
			$conocimiento_idiomas = $conocimiento_idiomas->where('Idm_ID', '!=', $id_conocimiento_idioma);
		}
		return $conocimiento_idiomas->get();
	}

	/**
	 * Devuelve los models que se van a eliminar
	 * @param  [type] $query              	[description]
	 * @param  [array] $bibliotecas 		[Las bibliotecas que aún se mantienen]
	 * @return [arrayEloquent]            	[los modelos de los accesos a bibliotecas que se van a
	 *                                          eliminar]
	 */
	public function scopeSeleccionarAccesoBibliotecaAEliminar($query, $bibliotecas){
		$acceso_bibliotecas = $this->acceso_bibliotecas();
		foreach ($bibliotecas as $biblioteca) {
			$acceso_bibliotecas = $acceso_bibliotecas->where('Bib_Nombre', '!=', $biblioteca);
		}
		return $acceso_bibliotecas->get();
	}

	/**
	 * Devuelve los modelos de los procesamientos de datos que se van a eliminar
	 * @param  [type] $query              	[description]
	 * @param  [array] $procesamientos_datos 		[Los procesamientos de datos que aún se mantienen]
	 * @return [arrayEloquent]            	[los modelos de los procesamientos de datos que se van a
	 *                                          eliminar]
	 */
	public function scopeSeleccionarAccesoProcesamientoDatosAEliminar($query, $procesamientos_datos){
		$acceso_procesamiento_datos = $this->acceso_procesamiento_datos();
		foreach ($procesamientos_datos as $procesamiento_datos) {
			$acceso_procesamiento_datos = $acceso_procesamiento_datos->where('PDa_Nombre', '!=', $procesamiento_datos);
		}
		return $acceso_procesamiento_datos->get();
	}

	/**
	 * Devuelve los modelos de los procesamientos de datos que se van a eliminar
	 * @param  [type] $query              	[description]
	 * @param  [array] $procesamientos_datos 		[Los procesamientos de datos que aún se mantienen]
	 * @return [arrayEloquent]            	[los modelos de los procesamientos de datos que se van a
	 *                                          eliminar]
	 */
	public function scopeSeleccionarAccesoProgramaComputacionAEliminar($query, $programas_computacionales){
		$acceso_programas_computacionales = $this->acceso_programas_computacionales();
		foreach ($programas_computacionales as $programa_computacional) {
			$acceso_programas_computacionales = $acceso_programas_computacionales->where('Prog_Nombre', '!=', $programa_computacional);
		}
		return $acceso_programas_computacionales->get();
	}

	/**
	 * Ordena descendentemente las experiencias profesionales según el año de fin e inicio.
	 * @return [arrayEloquent] 		[Los modelos de ExperienciaProfesional que pertenecen a
	 *                               InformacionAspirante ordenados descendentemente]
	 */
	public function experiencias_profesionales_desc(){
		return $this->experiencias_profesionales()->orderBy('Pro_Anio_Fin', 'DESC')->orderBy('Pro_Anio_Inicio', 'DESC');
	}

	/**
	 * Ordena descendentemente las experiencias en investigacion según el año de las
	 * investigaciones.
	 * @return [arrayEloquent] 		[Los modelos de ExperienciaInvestigacion que pertenecen a
	 *                               InformacionAspirante ordenados descendentemente]
	 */
	public function experiencias_investigaciones_desc(){
		return $this->experiencias_investigaciones()->orderBy('Inv_Anio', 'DESC');
	}

	/**
	 * Ordena descendentemente las publicaciones del aspirante según el año de publicada.
	 * @return [arrayEloquent] 		[Los modelos de Publicacion que pertenecen a
	 *                                InformacionAspirante ordenados descendentemente]
	 */
	public function publicaciones_desc(){
		return $this->publicaciones()->orderBy('Pub_Anio', 'DESC');
	}

	/**
	 * Ordena descendentemente los cursos o seminarios del aspirante según el año.
	 * @return [arrayEloquent] 		[Los modelos CursoSeminario que pertenecen a
	 *                                InformacionAspirante ordenados descendentemente]
	 */
	public function cursos_seminarios_desc(){
		return $this->cursos_seminarios()->orderBy('CSe_Annio', 'DESC');
	}


}

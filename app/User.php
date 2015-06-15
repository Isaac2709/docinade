<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Gen_Usuario';

	protected $primaryKey = 'Usu_ID';

	/*protected $perPage = 2;*//*linea para probar q la paginacion sirve con menos de 15 usuarios*/

	/**
	* Set the variables timestamps to false
	*
	* @var string
	*/
	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['Usu_Nombre', 'email', 'password', 'Usu_Tipo'];//GEN_ID_Usuario

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	* The eloquent relation to assigment a "formulario" model.
	*
	*/
	public function formulario(){
		return $this->hasOne('App\Formulario', 'GEN_ID_Usuario'); //IPe_ID
	}

	public function usuarioTieneFormulario()
    {
        return ! is_null(
            \DB::table('GEN_Info_Personal')
              	->where('GEN_ID_Usuario', '=',$this->Usu_ID)
              	->first()
        );
    }

    public function esAdministrador(){
    	return $this->Usu_Tipo == 'Administrador';
    }

    public function esAspirante(){
    	return $this->Usu_Tipo == 'Aspirante';
    }

    public function esProfesor(){
    	return $this->Usu_Tipo == 'Profesor';
    }

    // public function setPasswordAttribute($value){
    // 	if(!empty($value)){
	   //  	$this->attributes['password'] = bcrypt($value);
	   //  }
    // }
}

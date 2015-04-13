<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\DB;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Gen_Usuario';

	protected $primaryKey = 'Usu_ID';

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
	protected $fillable = ['Usu_Nombre', 'email', 'password'];

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
		return $this->hasOne('App\Formulario', 'GEN_ID_Usuario'); //GEN_ID_Usuario
	}

	public function usuarioTieneFormulario()
    {
        return ! is_null(
            \DB::table('ASP_Aspirante')
              	->where('GEN_ID_Usuario', '=',$this->Usu_ID)
              	->first()
        );
    }

}

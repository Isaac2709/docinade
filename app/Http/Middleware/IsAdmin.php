<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class IsAdmin {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	private $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(! $this->auth->user()->esAdministrador()){
			if($this->auth->user()->esProfesor()){
				if ($request->ajax())
				{
					return response('Unauthorized.', 401);
				}
				else
				{
					return redirect()->guest('/profesor')->withErrors('El usuario no tiene permisos de administrador');
				}
			}

			elseif($this->auth->user()->esAspirante()){
				if ($request->ajax())
				{
					return response('Unauthorized.', 401);
				}
				else
				{
					return redirect()->guest('/formulario')->withErrors('El usuario no tiene permisos de administrador');
				}
			}
		}
		return $next($request);
	}

}

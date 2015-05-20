<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class IsAspirant {

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
		if(! $this->auth->user()->esAspirante()){
			if($this->auth->user()->esProfesor()){
				if ($request->ajax())
				{
					return response('Unauthorized.', 401);
				}
				else
				{
					return redirect()->guest('/admin')->withErrors('El usuario es de tipo administrador');
				}
			}

			elseif($this->auth->user()->esAdministrador()){
				if ($request->ajax())
				{
					return response('Unauthorized.', 401);
				}
				else
				{
					return redirect()->guest('/admin')->withErrors('El usuario es de tipo administrador');
				}
			}
		}
		return $next($request);
	}

}

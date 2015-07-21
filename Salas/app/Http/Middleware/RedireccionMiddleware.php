<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class RedireccionMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user = Auth::user();
        //dd($user->roles()->whereNombre('Administrador')->first());
		if($user->roles()->whereNombre('Administrador')->first()){
			return redirect()->route('Admin.home.index');
		}
		elseif ($user->roles()->whereNombre('Encargado Campus')->first()){
            return redirect()->route('encar.home.index');
        }
        elseif($user->roles()->whereNombre('Estudiante')->first()){
            //return redirect()->route('');
        }
        elseif($user->roles()->whereNombre('Docente')->first()){
            //return redirect()->route('');
        }

		return $next($request);
	}

}

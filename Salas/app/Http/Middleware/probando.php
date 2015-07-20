<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class probando {

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
		if($user->roles()->whereNombre('Administrador')->first()){

			return redirect()->route('Admin.home.index');
		}
		elseif ($user->roles()->whereNombre('Encargado Campus')->first())
			return redirect()->route('encar.home.index');

		return $next($request);
	}

}

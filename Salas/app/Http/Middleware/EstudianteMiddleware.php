<?php namespace App\Http\Middleware;

use Closure;

class EstudianteMiddleware {

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
        if($user){
            if($user->roles()->get()[0]->nombre != 'Estudiante')
                return redirect()->route('auth.login');
        }
        else{
            return redirect()->route('auth.login');
        }
		return $next($request);
	}

}

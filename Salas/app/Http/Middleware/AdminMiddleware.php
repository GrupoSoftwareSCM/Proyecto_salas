<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;

use Auth;

class AdminMiddleware {

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
            if($user->roles()->get()[0]->nombre != 'ADMINISTRADOR')
                return redirect()->route('auth.login');
        }
        else{
            return redirect()->route('auth.login');
        }
		return $next($request);
	}

}

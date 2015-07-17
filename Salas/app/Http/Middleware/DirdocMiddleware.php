<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class DirdocMiddleware {

    protected $auth;
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
       
            if($request->ajax()){
                return response('no autorizado',401);
            }
            else{
                return "aqui debe de ir un login";
            }


		return $next($request);
	}

}

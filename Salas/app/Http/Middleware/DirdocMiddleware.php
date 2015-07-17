<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class DirdocMiddleware {

    protected $auth;

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
        dd($this->auth->guest());
        if ($this->auth->guest()) {

            if ($request->ajax()) {
                return response('no autorizado', 401);
            } else {
                return redirect()->guest('Login/login');
            }

        }
		return $next($request);
	}

}

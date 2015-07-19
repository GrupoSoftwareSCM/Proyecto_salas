<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class rut extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        \Validator::extend('rut', function($attribute, $value, $parameters)
        {
            return preg_match("\b\d{1,8}\-[K|k|0-9]", $value);
        });
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NiagahosterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    	foreach(glob(base_path('app/Module/**')) as $module_name) {
    		$str_arr = explode('/', $module_name);
			$this->app->singleton("App\\Module\\".$str_arr[count($str_arr)-1]."\\Contract",
				"App\\Module\\".$str_arr[count($str_arr)-1]."\\Service");
		}
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

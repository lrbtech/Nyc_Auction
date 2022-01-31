<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use AUTH;
use DB;
use App\site_info;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('page.app', function($view) {
    
            //$site_infos= DB::table('site_infos')->first();
            $site_infos = site_info::first();
             
            $view->with(compact('site_infos'));
        });
    }
}

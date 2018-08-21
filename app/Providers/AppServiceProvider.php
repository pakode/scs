<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        view()->composer('layouts.sidebar',function ($view) {
            $array = explode(',', Auth::user()->access);
            $menus=DB::table('SubsMsMenus')->where('sequence','<>',0)->whereIn('id',$array)->get();
            $submenus = DB::table('SubsMsMenus')->where('sequence','=',0)->whereIn('id',$array)->get();
            $view->with(['menus' => $menus,'submenus' => $submenus]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

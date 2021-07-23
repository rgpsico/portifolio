<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\page;
use App\Models\servicos;
use App\Models\Setting;

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
        //Menu
        $frontMenu = [
            '/' => 'Home'
        ];
        $pages = page::all();
        foreach($pages as $page){
            $frontMenu [$page['slug']] = $page['title'];
        }
       View::share('front_menu',$frontMenu);
    
      //CONFIGURAÇÔES
      $config = [];
      $settings = Setting::all();
      foreach($settings as $setting){
          $config[$setting['name']] = $setting['content'];

      }

      View::share('front_config',$config);

      view()->composer(
        'Site.*',
        function($view) {
            $view->with('servicos',servicos::all());
        }
    );
    
    }
}

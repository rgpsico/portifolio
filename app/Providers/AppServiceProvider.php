<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
  
    
      //CONFIGURAÇÔES
      $config = [];
      $settings = Setting::all();
      foreach($settings as $setting){
          $config[$setting['name']] = $setting['content'];

      }

      View::share('front_config',$config);
    
    }
}

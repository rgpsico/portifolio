<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    ArticleRepositoryInterface,
    BaseRepositoryInterface as ContractsBaseRepositoryInterface,
};
use App\Repositories\{
    ArticleRepository,
    BaseRepository,
};

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ArticleRepositoryInterface::class,
            ArticleRepository::class
        );  
        
        $this->app->bind(
            ContractsBaseRepositoryInterface::class,
            BaseRepository::class
        );   
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
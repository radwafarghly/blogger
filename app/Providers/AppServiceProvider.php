<?php

namespace App\Providers;

use App\Repositories\ArticlesRepository;
use App\Repositories\ModelRelationRepository;
use App\Repositories\PostRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PostRepository::class);
        $this->app->singleton(ArticlesRepository ::class);
        $this->app->singleton(ModelRelationRepository ::class);



    }
}

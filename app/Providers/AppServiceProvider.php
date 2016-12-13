<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Auth\UserRepositoryContract::class,
            \App\Repositories\Auth\EloquentUserRepository::class
        );

        $this->app->bind(
            \App\Repositories\Post\PostRepositoryContract::class,
            \App\Repositories\Post\EloquentPostRepository::class
        );
    }
}

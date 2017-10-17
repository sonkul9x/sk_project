<?php

namespace App\Providers;

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
        // NEW
        $this->app->singleton(
        \App\Repositories\News\NewsRepositoryInterface::class,
        \App\Repositories\News\NewsEloquentRepository::class
         );
        // CATE
        $this->app->singleton(
        \App\Repositories\Cate\CateRepositoryInterface::class,
        \App\Repositories\Cate\CateEloquentRepository::class
         );
        // PAGE
        $this->app->singleton(
        \App\Repositories\Page\PageRepositoryInterface::class,
        \App\Repositories\Page\PageEloquentRepository::class
         );
        // Customer
        $this->app->singleton(
        \App\Repositories\Customer\CustomerRepositoryInterface::class,
        \App\Repositories\Customer\CustomerEloquentRepository::class
         );
    }
}

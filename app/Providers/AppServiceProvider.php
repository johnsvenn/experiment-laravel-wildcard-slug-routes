<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Blog;
use App\Page;
use App\Observers\DefaultFormObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blog::observe(DefaultFormObserver::class);
        Page::observe(DefaultFormObserver::class);
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

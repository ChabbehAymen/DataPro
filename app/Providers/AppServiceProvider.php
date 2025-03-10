<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TagRepository;
use App\Services\TagService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(TagRepository::class, TagRepository::class);
        $this->app->bind(TagService::class, TagService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

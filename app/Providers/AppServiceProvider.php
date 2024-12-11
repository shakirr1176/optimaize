<?php

namespace App\Providers;

use App\Services\LanguageService;
use Illuminate\Support\Facades\Vite;
use App\Services\VerificationService;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(LanguageService::class, function () {
            return new LanguageService(
                new Filesystem,
                $this->app['path.lang'],
                [$this->app['path.resources'], $this->app['path']]
            );
        });

        $this->app->singleton(VerificationService::class, function () {
            return new VerificationService();
        });

        Vite::macro('image', fn ($asset) => $this->asset("resources/images/{$asset}"));
        Vite::macro('icon', fn ($asset) => $this->asset("resources/icons/{$asset}"));
        Vite::macro('css', fn ($asset) => $this->asset("resources/css/{$asset}"));
        Vite::macro('js', fn ($asset) => $this->asset("resources/js/{$asset}"));
    }
}

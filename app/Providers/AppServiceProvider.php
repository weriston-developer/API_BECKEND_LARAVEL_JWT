<?php

namespace App\Providers;

use App\Services\CidadeService;
use App\Services\MedicoService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CidadeService::class, function ($app) {
            return new CidadeService();
        });

        $this->app->bind(MedicoService::class, function ($app) {
            return new MedicoService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

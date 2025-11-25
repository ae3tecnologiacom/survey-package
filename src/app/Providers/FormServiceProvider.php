<?php

namespace Ae3\Survey\app\Providers;

use Ae3\Survey\app\Commands\FormInstall;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrations();
            $this->mergeConfig();
            $this->publishes([
                __DIR__ . '/../../config/form.php' => config_path('form.php')
            ], 'form-config');
            $this->commands([
                FormInstall::class
            ]);

            $this->publishes([
                __DIR__ . '/../Models' => app_path('Models', 'form-models'),
            ]);

            $this->publishes([
                __DIR__ . '/../../database/migrations' => database_path('migrations'),
            ], 'form-migrations');
            
            $this->loadRoutesFrom(__DIR__ . '/../../routes/form.php');
        }
    }

    /**
     * @return void
     */
    private function mergeConfig(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/form.php',
            'form-config'
        );
    }

    private function loadMigrations(): void
    {
        $this->loadMigrationsFrom(
            __DIR__ . '/../../database/migrations'
        );
    }
}

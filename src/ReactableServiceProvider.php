<?php

namespace Elviro\Reactable;

use Elviro\Reactable\Commands\CreateReactions;
use Illuminate\Support\ServiceProvider;

class ReactableServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/0000_00_00_000000_create_reactable_table.php');

        // $this->publishMigrations();

        $this->registerCommands();
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/reactable.php',
            'reactable'
        );
    }

    // protected function publishMigrations()
    // {
    //     $timestamp = date('Y_m_d_His');

    //     $this->publishes([
    //         __DIR__ . '/../database/create_reactable_table.php' => $this->app->databasePath() . '/migrations/' . $timestamp . '_create_reactable_table.php'
    //     ]);
    // }

    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateReactions::class
            ]);
        }
    }
}

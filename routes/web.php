<?php

use Elviro\Reactable\Models\Reaction;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;

Route::get('/reactable', function () {

    $filesystem = $this->app->make(Filesystem::class);
    $migrationFileName = 'add_google_id_to_users_table.php';
    $x = Collection::make($this->app->databasePath() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR)
        ->flatMap(function ($path) use ($filesystem, $migrationFileName) {
            return $filesystem->glob($path . '*_' . $migrationFileName);
        })->push($this->app->databasePath() . "/migrations/test.php")
        ->first();

    dd($x);

    return app()->databasePath();
    return Reaction::xx();
});

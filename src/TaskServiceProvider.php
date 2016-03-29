<?php

namespace Rori\Task;

use Illuminate\Support\ServiceProvider;
use App\Models\Task;

class TaskServiceProvider extends ServiceProvider
{

     /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/Http/routes.php';
        $this->publishes([
            __DIR__ . '/migrations' => $this->app->databasePath() . '/migrations'
        ], 'migrations');
    }

    public function register()
    {
        // $this->app->singleton(Task::class, function () {
        //     return new Task;
        // });
    }
}
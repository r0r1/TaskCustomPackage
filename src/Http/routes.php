<?php

use Illuminate\Routing\Router;

Route::group(['prefix' => 'api/v1'], function(){
    Route::resource('task', 'Rori\Task\Http\Controllers\TasksController');
});
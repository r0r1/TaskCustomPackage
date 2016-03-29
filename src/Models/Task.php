<?php

namespace Rori\Task\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model{

    protected $table = 'tasks';

    protected $fillable = [
        'slug',
        'name',
        'description',
        'attachment',
        'user_id'
    ];
    
}
<?php

namespace Rori\Task\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function(Blueprint $t)
        {
            $t->increments('id');
            $t->text('slug', 255);
            $t->text('name', 255);
            $t->text('description', 255);
            $t->text('attachment');
            $t->integer('user_id')->unsigned();
            $t->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('tasks');
    }
}
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventZRoleTable extends Migration
{
    public function up()
    {
        Schema::create('Event_z_Role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('abbv', 4);
            $table->string('value', 50);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Event_z_Role created!");

    }

    public function down()
    {
        Schema::dropIfExists('Event_z_Role');
        Log::warning("[Migration] Table Event_z_Role deleted!");
    }
}

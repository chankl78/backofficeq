<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccessZAccessRolesTable extends Migration
{
    public function up()
    {
        Schema::create('Access_z_Roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value', 50);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Access_z_Roles created!");
    }

    public function down()
    {
        Schema::dropIfExists('Access_z_Roles');
        Log::warning("[Migration] Table Access_z_Roles deleted!");
    }
}

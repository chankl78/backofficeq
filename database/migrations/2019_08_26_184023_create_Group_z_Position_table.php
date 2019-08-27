<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupZPositionTable extends Migration
{
    public function up()
    {
        Schema::create('Group_z_Position', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('groupid');
            $table->string('value', 20);
            $table->integer('lineno')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Group_z_Position created!");
    }

    public function down()
    {
        Schema::dropIfExists('Group_z_Position');
        Log::warning("[Migration] Table Group_z_Position deleted!");
    }
}

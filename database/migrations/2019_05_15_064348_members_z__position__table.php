<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MembersZPositionTable extends Migration
{
    public function up()
    {
        Schema::create('Members_z_Position', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10);
            $table->string('name', 255);
            $table->string('level', 25)->nullable();
            $table->boolean('notinuse', 1)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Members_z_Position created!");
    }

    public function down()
    {
        Schema::dropIfExists('Members_z_Position');
        Log::warning("[Migration] Table Members_z_Position deleted!");
    }
}

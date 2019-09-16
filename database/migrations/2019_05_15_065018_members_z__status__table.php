<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MembersZStatusTable extends Migration
{
    public function up()
    {
        Schema::create('Members_z_Status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Members_z_Status created!");
    }

    public function down()
    {
        Schema::dropIfExists('Members_z_Status');
        Log::warning("[Migration] Table Members_z_Status deleted!");
    }
}

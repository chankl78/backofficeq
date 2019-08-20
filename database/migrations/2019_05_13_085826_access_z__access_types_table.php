<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccessZAccessTypesTable extends Migration
{
    public function up()
    {
        Schema::create('Access_z_AccessTypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value', 25);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Access_z_AccessTypes created!");
    }

    public function down()
    {
        Schema::dropIfExists('Access_z_AccessTypes');
        Log::warning("[Migration] Table Access_z_AccessTypes deleted!");
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfigurationMDefaultTable extends Migration
{
    public function up()
    {
        Schema::create('Configuration_m_Default', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description', 150);
            $table->string('value', 150);
            $table->string('key', 10);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Configuration_m_Default created!");
    }

    public function down()
    {
        Schema::dropIfExists('Configuration_m_Default');
        Log::warning("[Migration] Table Configuration_m_Default deleted!");
    }
}

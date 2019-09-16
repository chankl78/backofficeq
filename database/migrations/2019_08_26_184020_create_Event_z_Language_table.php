<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventZLanguageTable extends Migration
{
    public function up()
    {
        Schema::create('Event_z_Language', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value', 50);
            $table->tinyInteger('studyexam')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Event_z_Language created!");
    }

    public function down()
    {
        Schema::dropIfExists('Event_z_Language');
        Log::warning("[Migration] Table Event_z_Language deleted!");
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventZEventTypeTable extends Migration
{
    public function up()
    {
        Schema::create('Event_z_EventType', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value', 50);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Event_z_EventType created!");
    }

    public function down()
    {
        Schema::dropIfExists('Event_z_EventType');
        Log::warning("[Migration] Table Event_z_EventType deleted!");
    }
}

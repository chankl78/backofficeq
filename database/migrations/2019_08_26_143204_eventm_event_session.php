<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventmEventSession extends Migration
{
    public function up()
    {
        Schema::create('Event_m_EventSession', function (Blueprint $table)
		{
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->integer('lineno');
			$table->integer('eventid');
			$table->string('value', 150);
			$table->timestamps();
			$table->softDeletes();
        });
        
        Log::info("[Migration] Table Event_m_EventSession created!");
    }

    public function down()
    {
        Schema::dropIfExists('Event_m_EventSession');
        Log::warning("[Migration] Table Event_m_EventSession deleted!");
    }
}

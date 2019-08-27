<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventmEventItem extends Migration
{
    public function up()
    {
        Schema::create('Event_m_EventItem', function (Blueprint $table)
		{
            $table->increments('id');
            $table->uuid('uniquecode');
			$table->integer('eventid');
			$table->string('name', 150);
			$table->timestamps();
			$table->softDeletes();
        });
        
        Log::info("[Migration] Table Event_m_EventItem created!");
    }

    public function down()
    {
        Schema::dropIfExists('Event_m_EventItem');
        Log::warning("[Migration] Table Event_m_EventItem deleted!");
    }
}

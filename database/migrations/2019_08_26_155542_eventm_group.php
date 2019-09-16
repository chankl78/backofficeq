<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventmGroup extends Migration
{
    public function up()
    {
        Schema::create('Event_m_Group', function(Blueprint $table)
		{
            $table->increments('id');
            $table->uuid('uniquecode');
			$table->integer('eventid');
			$table->string('groupid', 15);
			$table->string('name', 150);
			$table->text('description');
			$table->timestamps();
			$table->softDeletes();
        });
        
        Log::info("[Migration] Table Event_m_Group created!");
    }

    public function down()
    {
        Schema::dropIfExists('Event_m_Group');
        Log::warning("[Migration] Table Event_m_Group deleted!");
    }
}

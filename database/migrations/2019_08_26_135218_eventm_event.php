<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventmEvent extends Migration
{
    public function up()
    {
        Schema::create('Event_m_Event', function (Blueprint $table)
		{
			$table->increments('id');
			$table->uuid('uniquecode');
			$table->date('eventdate') -> index();
			$table->string('location', 255);
			$table->string('eventtype', 50);
			$table->string('createby', 150);
            $table->boolean('shqregistration', 1) -> default(0);
            $table->boolean('regionregistration', 1) -> default(0);
            $table->boolean('zoneregistration', 1) -> default(0);
            $table->boolean('chapterregistration', 1) -> default(0);
            $table->boolean('districtregistration', 1) -> default(0);
            $table->boolean('memregistration', 1) -> default(0);
            $table->boolean('viewattendance', 1) -> default(0);
            $table->boolean('special', 1) -> default(0);
            $table->boolean('readonly', 1) -> default(0);
            $table->boolean('sessionselect', 1) -> default(0);
            $table->boolean('languageselect', 1) -> default(0);
            $table->boolean('nationalityselect', 1) -> default(0);
            $table->boolean('addnontokang', 1) -> default(0);
			$table->text('directaccept') -> nullable();
			$table->string('status', 20) -> default('Active');
			$table->timestamps();
			$table->softDeletes();
        });

        Log::info("[Migration] Table Event_m_Event created!");
    }

    public function down()
    {
        Schema::dropIfExists('Event_m_Event');
        Log::warning("[Migration] Table Event_m_Event deleted!");
    }
}

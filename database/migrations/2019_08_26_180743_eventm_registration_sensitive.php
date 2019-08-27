<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventmRegistrationSensitive extends Migration
{
    public function up()
    {
        Schema::create('Event_m_RegistrationSensitive', function(Blueprint $table)
		{
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->integer('eventid') -> default(0);
            $table->integer('eventiddetail') -> default(0);
            $table->integer('memberid') -> default(0);
            $table->binary('nric') -> nullable();
			$table->binary('tel') -> nullable();
			$table->binary('mobile') -> nullable();
			$table->binary('email') -> nullable();
			$table->binary('address') -> nullable();
			$table->binary('buildingname') -> nullable();
			$table->binary('unitno') -> nullable();
			$table->binary('postalcode') -> nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        Log::info("[Migration] Table Event_m_RegistrationSensitive created!");
    }

    public function down()
    {
        Schema::dropIfExists('Event_m_RegistrationSensitive');
        Log::warning("[Migration] Table Event_m_RegistrationSensitive deleted!");
    }
}

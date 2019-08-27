<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventZRegistrationStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Event_z_RegistrationStatus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Event_z_RegistrationStatus created!");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Event_z_RegistrationStatus');
        Log::warning("[Migration] Table Event_z_RegistrationStatus deleted!");
    }
}

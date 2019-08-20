<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VehicleZBookingStatusTable extends Migration
{
    public function up()
    {
        Schema::create('Vehicle_z_BookingStatus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value', 150);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Vehicle_m_BookingStatus created!");
    }

    public function down()
    {
        Schema::dropIfExists('Vehicle_z_BookingStatus');
        Log::warning("[Migration] Table Vehicle_m_BookingStatus deleted!");
    }
}

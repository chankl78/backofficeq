<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VehicleMVehicleTable extends Migration
{
    public function up()
    {
        Schema::create('Vehicle_m_Vehicle', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->string('vehicleno', 10);
            $table->date('purchasedate')->nullable();
            $table->string('status', 10);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Vehicle_m_Vehicle created!");
    }

    public function down()
    {
        Schema::dropIfExists('Vehicle_m_Vehicle');
        Log::warning("[Migration] Table Vehicle_m_Vehicle deleted!");
    }
}

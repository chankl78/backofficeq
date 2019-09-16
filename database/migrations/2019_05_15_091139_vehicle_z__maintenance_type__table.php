<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VehicleZMaintenanceTypeTable extends Migration
{
    public function up()
    {
        Schema::create('Vehicle_z_MaintenanceType', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value', 50);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Vehicle_m_MaintenanceType created!");
    }

    public function down()
    {
        Schema::dropIfExists('Vehicle_z_MaintenanceType');
        Log::warning("[Migration] Table Vehicle_m_MaintenanceType deleted!");
    }
}

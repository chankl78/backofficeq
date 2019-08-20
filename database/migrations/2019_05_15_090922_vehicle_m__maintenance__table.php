<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VehicleMMaintenanceTable extends Migration
{
    public function up()
    {
        Schema::create('Vehicle_m_Maintenance', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->string('vehicleno', 10);
            $table->date('maintenancedate');
            $table->string('maintenancetype', 50);
            $table->text('description');
            $table->decimal('cost', 8, 2);
            $table->string('sendby', 150);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Vehicle_m_Maintenance created!");
    }

    public function down()
    {
        Schema::dropIfExists('Vehicle_m_Maintenance');
        Log::warning("[Migration] Table Vehicle_m_Maintenance deleted!");
    }
}

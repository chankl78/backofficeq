<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StaffMStaffTable extends Migration
{
    public function up()
    {
        Schema::create('Staff_m_Staff', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->string('name', 150)->index();
            $table->string('stafftype', 20)->default('Full-Time');
            $table->string('department', 20)->default('General Admin');
            $table->string('position', 20)->default('Staff');
            $table->boolean('driver', 1)->default(0);
            $table->string('status', 20)->default('Active');
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Staff_m_Staff created!");
    }

    public function down()
    {
        Schema::dropIfExists('Staff_m_Staff');
        Log::warning("[Migration] Table Staff_m_Staff deleted!");
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceZStatusTable extends Migration
{
    public function up()
    {
        Schema::create('Attendance_z_Status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Attendance_z_Status created!");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Attendance_z_Status');
        Log::warning("[Migration] Table Attendance_z_Status deleted!");
    }
}

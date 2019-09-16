<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceZTypeTable extends Migration
{
    public function up()
    {
        Schema::create('Attendance_z_Type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value', 25)->default('');
            $table->string('description', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Attendance_z_Type created!");
    }

    public function down()
    {
        Schema::dropIfExists('Attendance_z_Type');
        Log::warning("[Migration] Table Attendance_z_Type deleted!");
    }
}

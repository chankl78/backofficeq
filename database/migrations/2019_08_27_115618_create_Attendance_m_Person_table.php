<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceMPersonTable extends Migration
{
    public function up()
    {
        Schema::create('Attendance_m_Person', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->integer('attendanceid');
            $table->integer('eventid')->default(0);
            $table->integer('eventregid')->default(0);
            $table->integer('memberid');
            $table->string('name', 150);
            $table->string('chinesename', 255)->nullable();
            $table->string('rhq', 2)->nullable();
            $table->string('zone', 4)->nullable();
            $table->string('chapter', 4)->nullable();
            $table->string('district', 2)->nullable();
            $table->string('division', 3)->nullable();
            $table->string('position', 10)->nullable();
            $table->string('positionlevel', 15)->nullable();
            $table->string('contactgroup', 20)->nullable();
            $table->string('positiongroup', 50)->nullable();
            $table->string('attendancestatus', 10)->default('0');
            $table->text('remarks')->nullable();
            $table->integer('noofnewfriend')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Attendance_m_Person created!");
    }

    public function down()
    {
        Schema::dropIfExists('Attendance_m_Person');
        Log::warning("[Migration] Table Attendance_m_Person deleted!");
    }
}

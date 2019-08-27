<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceMAttendanceTable extends Migration
{
    public function up()
    {
        Schema::create('Attendance_m_Attendance', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->date('attendancedate');
            $table->time('attendancetime');
            $table->text('description');
            $table->string('createbyname', 150);
            $table->integer('eventid')->nullable();
            $table->string('event', 150)->nullable();
            $table->string('eventitem', 150)->nullable();
            $table->integer('groupid')->nullable();
            $table->string('groupname', 150)->nullable();
            $table->string('groupcodeprefix', 11)->nullable();
            $table->string('attendancetype', 20)->default('Actual');
            $table->string('rhq', 2)->nullable();
            $table->string('zone', 4)->nullable();
            $table->string('chapter', 4)->nullable();
            $table->string('district', 2)->nullable();
            $table->integer('tokangmembership')->default(0);
            $table->integer('md')->default(0);
            $table->integer('wd')->default(0);
            $table->integer('ymd')->default(0);
            $table->integer('ywd')->default(0);
            $table->integer('pd')->default(0);
            $table->integer('yc')->default(0);
            $table->integer('attendancetotal')->default(0);
            $table->integer('ldr')->default(0);
            $table->integer('mem')->default(0);
            $table->integer('bel')->default(0);
            $table->integer('nf')->default(0);
            $table->integer('srmd')->default(0);
            $table->integer('srwd')->default(0);
            $table->integer('srymd')->default(0);
            $table->integer('srywd')->default(0);
            $table->integer('hvmd')->default(0);
            $table->integer('hvwd')->default(0);
            $table->integer('hvymd')->default(0);
            $table->integer('hvywd')->default(0);
            $table->string('status', 20)->default('Active');
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Attendance_m_Attendance created!");
    }

    public function down()
    {
        Schema::dropIfExists('Attendance_m_Attendance');
        Log::warning("[Migration] Table Attendance_m_Attendance deleted!");
    }
}

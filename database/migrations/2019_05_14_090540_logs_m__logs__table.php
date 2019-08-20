<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LogsMLogsTable extends Migration
{
    public function up()
    {
        Schema::create('Logs_m_Logs', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->integer('userid');
            $table->string('logtype', 10);
            $table->string('resourceid', 10)->nullable();
            $table->string('resourcecode', 100)->nullable();
            $table->integer('eventid')->default(0);
            $table->integer('eventdetailid')->default(0);
            $table->integer('groupid')->default(0);
            $table->integer('groupdetailid')->default(0);
            $table->integer('attendanceid')->default(0);
            $table->integer('attendancedetailid')->default(0);
            $table->integer('campaignid')->default(0);
            $table->integer('campaigndetailid')->default(0);
            $table->integer('memberid')->default(0);
            $table->integer('vehicleid')->default(0);
            $table->integer('vehicledetailid')->default(0);
            $table->text('description')->nullable();
            $table->text('from')->nullable();
            $table->text('to')->nullable();
            $table->string('device', 255)->nullable();
            $table->string('platform', 255)->nullable();
            $table->string('platformversion', 255)->nullable();
            $table->string('browser', 255)->nullable();
            $table->string('browserversion', 255)->nullable();
            $table->string('ipaddress', 50)->nullable();
            $table->string('session', 100)->nullable();
            $table->string('status', 20);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Logs_m_Logs created!");
    }

    public function down()
    {
        Schema::dropIfExists('Logs_m_Logs');
        Log::warning("[Migration] Table Logs_m_Logs deleted!");
    }
}

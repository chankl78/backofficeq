<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceMAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Attendance_m_Attendance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('eventid') -> nullable();
            $table->date('attendancedate')->index();
            $table->time('attendancetime')->index();
            $table->text('description');
            $table->string('createbyname', 150);
            $table->string('event', 150)->nullable();
            $table->string('attendancetype', 20)->default('Actual');
			$table->string('status', 20)->default('Active');
			$table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Attendance_m_Attendance');
    }
}

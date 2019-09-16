<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VehicleMBookingTable extends Migration
{
    public function up()
    {
        Schema::create('Vehicle_m_Booking', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->date('bookingdate')->index();
            $table->time('starttime')->index();
            $table->time('endtime')->index();
            $table->string('vehicleno', 10);
            $table->string('bookbyname', 150);
            $table->string('drivebyname', 150)->nullable();
            $table->string('event', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('route')->nullable();
            $table->string('approvedby', 150);
            $table->string('approveddatetime', 150);
            $table->boolean('Overnight')->default(0);
            $table->string('Overnightapprovedby', 150);
            $table->string('status', 20)->default('Processing');
            $table->text('remark');
            $table->dateTime('vehiclecheckout')->nullable();
            $table->dateTime('vehiclecheckin')->nullable();
            $table->integer('previousmilage')->nullable();
            $table->integer('lastmilage')->nullable();
            $table->decimal('cashcardvalue', 8, 2)->default(0);
            $table->boolean('lowparkingcoupons')->default(0);
            $table->boolean('lowfuel')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Vehicle_m_Booking created!");
    }

    public function down()
    {
        Schema::dropIfExists('Vehicle_m_Booking');
        Log::warning("[Migration] Table Vehicle_m_Booking deleted!");
    }
}

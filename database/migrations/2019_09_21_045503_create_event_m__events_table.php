<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventMEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Event_m_Event', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uniquecode');
            $table->date('eventdate')->index();
            $table->string('location', 255);
            $table->string('eventtype', 50);
            $table->string('createby', 150);
            $table->boolean('pdpanric')->default(false);
            $table->boolean('pdpaaddress')->default(false);
            $table->boolean('pdpatelmobileemail')->default(false);
            $table->boolean('memregistration')->default(false);
            $table->text('description')->nullable();
            $table->string('status')->default('Active');
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
        Schema::dropIfExists('Event_m_Event');
    }
}

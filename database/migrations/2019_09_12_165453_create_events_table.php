<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uniquecode')->unique();
            $table->date('eventdate')->index();
            $table->text('description')->nullable();
            $table->string('status', 20)->default('Active');
            $table->boolean('pdpanric', 1)->default(0);
			$table->boolean('pdpaaddress', 1)->default(0);
			$table->boolean('pdpatelmobileemail', 1)->default(0);
			$table->boolean('memregistration', 1)->default(0);
            // should be changed to foreign
			$table->string('location', 255);
            $table->string('createby', 150);

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
        Schema::dropIfExists('events');
    }
}

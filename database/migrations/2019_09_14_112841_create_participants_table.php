<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uniquecode')->unique();
            $table->string('name');
            $table->string('rhq', 2)->nullable();
            $table->string('zone', 4)->nullable();
            $table->char('gender')->nullable();
            $table->unsignedInteger('age')->nullable();
            $table->string('chapter', 4)->nullable();
            $table->string('district', 2)->nullable();
            $table->string('position', 10)->nullable();
            $table->string('division', 3)->nullable();
            $table->string('role', 150)->nullable();
            $table->binary('nric')->nullable();
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
        Schema::dropIfExists('participants');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberSsaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_ssa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('participant_id')->nullable();
            $table->uuid('uniquecode')->unique();

            $table->string('name');
            $table->string('chinese_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->binary('nric')->nullable();
            $table->binary('tel')->nullable();
            $table->binary('mobile')->nullable();
            $table->binary('email')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('nationality')->nullable();
            $table->string('birth_country')->nullable();
            $table->string('race')->nullable();
            $table->string('occupation')->nullable();
            $table->string('language')->nullable();
            $table->char('gender')->nullable();

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
        Schema::dropIfExists('member_ssa');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersMSSASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Members_m_SSA', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uniquecode')->unique();
            $table->unsignedInteger('personid')->unique()->nullable();
            $table->string('searchcode', 3);

            $table->string('name', 150);
            $table->string('chinesename', 255) ->nullable();
            $table->date('dateofbirth')->nullable();
            $table->string('classification', 4)->nullable();
            $table->string('gender', 1)->nullable();
            $table->string('rhq', 2)->nullable();
            $table->string('zone', 4)->nullable();
            $table->string('chapter', 4)->nullable();
            $table->string('district', 2)->nullable();
            $table->string('position', 3)->nullable();
            $table->string('division', 4)->nullable();
            $table->binary('nric')->nullable();
            $table->binary('tel')->nullable();
            $table->binary('mobile')->nullable();
            $table->binary('email')->nullable();
            $table->binary('address')->nullable();
            $table->binary('buildingname')->nullable();
            $table->binary('unitno')->nullable();
            $table->binary('postalcode')->nullable();
            $table->string('lengthofpractise', 2)->nullable();
            $table->string('language', 25)->nullable();
            $table->string('occupation', 150)->nullable();
            $table->string('countryofbirth', 150)->nullable();
            $table->string('nationality', 150)->nullable();
            $table->string('race', 150)->nullable();
            $table->string('bloodgroup', 3)->nullable();
            $table->boolean('nodrugallergy', 1)->default(0);
            $table->text('drugallergy')->nullable();
            $table->string('introducer', 150)->nullable();
            $table->binary('introducermobile');
            $table->string('emergencyname', 255)->nullable();
            $table->string('emergencyrelationship', 255)->nullable();
            $table->binary('emergencytel')->nullable();
            $table->binary('emergencymobile')->nullable();
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
        Schema::dropIfExists('Members_m_SSA');
    }
}

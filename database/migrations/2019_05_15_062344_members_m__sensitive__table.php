<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MembersMSensitiveTable extends Migration
{
    public function up()
    {
        Schema::create('Members_m_Sensitive', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->integer('memberid')->default(0);
            $table->binary('nric')->nullable();
            $table->binary('tel')->nullable();
            $table->binary('mobile')->nullable();
            $table->binary('email')->nullable();
            $table->binary('address')->nullable();
            $table->binary('buildingname')->nullable();
            $table->binary('unitno')->nullable();
            $table->binary('postalcode')->nullable();
            $table->binary('introducermobile');
            $table->binary('emergencytel')->nullable();
            $table->binary('emergencymobile')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Members_m_Sensitive created!");
    }

    public function down()
    {
        Schema::dropIfExists('Members_m_Sensitive');
        Log::warning("[Migration] Table Members_m_Sensitive deleted!");
    }
}

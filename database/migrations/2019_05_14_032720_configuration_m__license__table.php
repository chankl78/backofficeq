<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfigurationMLicenseTable extends Migration
{
    public function up()
    {
        Schema::create('Configuration_m_License', function (Blueprint $table) {
            $table->increments('id');
            $table->binary('company');
            $table->binary('licenseno');
            $table->binary('noofusers'); // 0 = unlimited
            $table->binary('noofbranches'); // 0 = unlimited
            $table->binary('trial')->nullable();
            $table->binary('trialstartdate')->nullable();
            $table->binary('trialenddate')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Configuration_m_License created!");
    }

    public function down()
    {
        Schema::dropIfExists('Configuration_m_License');
        Log::warning("[Migration] Table Configuration_m_License deleted!");
    }
}

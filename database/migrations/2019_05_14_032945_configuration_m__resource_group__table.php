<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfigurationMResourceGroupTable extends Migration
{
    public function up()
    {
        Schema::create('Configuration_m_ResourceGroup', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prefix', 10)->nullable();
            $table->string('postfix', 10)->nullable();
            $table->string('code', 10)->unique();
            $table->string('resourcegroup', 150)->index();
            $table->binary('enabled');
            $table->binary('trial')->nullable();
            $table->binary('trialstartdate')->nullable();
            $table->binary('trialenddate')->nullable();
            $table->string('applicationversion', 10)->nullable();
            $table->string('databaseversion', 10)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Configuration_m_ResourceGroup created!");
    }

    public function down()
    {
        Schema::dropIfExists('Configuration_m_ResourceGroup');
        Log::warning("[Migration] Table Configuration_m_ResourceGroup deleted!");
    }
}

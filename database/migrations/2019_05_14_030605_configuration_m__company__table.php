<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfigurationMCompanyTable extends Migration
{
    public function up()
    {
        Schema::create('Configuration_m_Company', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150)->index();
            $table->string('address', 250)->nullable();
            $table->string('postalcode', 6)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('tel', 10)->nullable();
            $table->string('fax', 10)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('uenno', 50)->nullable();
            $table->string('gstno', 50)->nullable();
            $table->binary('logo')->nullable();
            $table->string('googlemap')->nullable();
            $table->string('status', 20)->default('Active');
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Configuration_m_Company created!");
    }

    public function down()
    {
        Schema::dropIfExists('Configuration_m_Company');
        Log::warning("[Migration] Table Configuration_m_Company deleted!");
    }
}

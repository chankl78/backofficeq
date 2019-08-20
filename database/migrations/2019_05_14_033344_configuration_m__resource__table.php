<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfigurationMResourceTable extends Migration
{
    Public function up()
    {
        Schema::create('Configuration_m_Resource', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('resourcegroupcode', 10);
			$table->string('code', 10) -> unique();
			$table->string('resource', 255) -> index();
			$table->timestamps();
			$table->softDeletes();
        });

        Log::info("[Migration] Table Configuration_m_Resource created!");
    }

    public function down()
    {
        Schema::dropIfExists('Configuration_m_Resource');
        Log::warning("[Migration] Table Configuration_m_Resource deleted!");
    }
}

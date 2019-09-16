<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignMCampaignTable extends Migration
{
    public function up()
    {
        Schema::create('Campaign_m_Campaign', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->date('resourcedate');
            $table->string('campaigntype', 50)->nullable();
            $table->string('leveltype', 25)->nullable();
            $table->string('divisiontype', 25)->nullable();
            $table->string('createby', 150);
            $table->string('description', 150)->nullable();
            $table->string('uom', 25)->nullable();
            $table->string('status', 20)->default('Active');
            $table->integer('eventid')->default(0);
            $table->string('eventname', 255)->nullable();
            $table->tinyInteger('shqregistration')->default(0);
            $table->tinyInteger('regionregistration')->default(0);
            $table->tinyInteger('zoneregistration')->default(0);
            $table->tinyInteger('chapterregistration')->default(0);
            $table->tinyInteger('districtregistration')->default(0);
            $table->tinyInteger('memregistration')->default(0);
            $table->tinyInteger('readonly')->default(0);
            $table->timestamps();
            $table->softDeletes();

        });

        Log::info("[Migration] Table Campaign_m_Campaign created!");

    }

    public function down()
    {
        Schema::dropIfExists('Campaign_m_Campaign');
        Log::warning("[Migration] Table Campaign_m_Campaign deleted!");
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignZCampaignTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Campaign_z_CampaignType', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Campaign_z_CampaignType created!");

    }

    public function down()
    {
        Schema::dropIfExists('Campaign_z_CampaignType');
        Log::warning("[Migration] Table Campaign_z_CampaignType deleted!");
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignZCampaignDetailTypeTable extends Migration
{
    public function up()
    {
        Schema::create('Campaign_z_CampaignDetailType', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Campaign_z_CampaignDetailType created!");
    }

    public function down()
    {
        Schema::dropIfExists('Campaign_z_CampaignDetailType');
        Log::warning("[Migration] Table Campaign_z_CampaignDetailType deleted!");
    }
}

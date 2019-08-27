<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignMDetailTable extends Migration
{
    public function up()
    {
        Schema::create('Campaign_m_Detail', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->integer('personid')->default(0);
            $table->integer('memberid')->default(0);
            $table->integer('campaignid')->default(0);
            $table->dateTime('campaigndetaildate')->nullable();
            $table->string('campaigndetailtype', 25)->nullable();
            $table->string('name', 150)->nullable();
            $table->string('value', 255)->default('');
            $table->string('rhq', 2)->nullable();
            $table->string('zone', 4)->nullable();
            $table->string('chapter', 4)->nullable();
            $table->string('district', 2)->nullable();
            $table->string('position', 3)->nullable();
            $table->string('positionlevel', 15)->nullable();
            $table->string('division', 4)->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });

        

    }

    public function down()
    {
        Schema::dropIfExists('Campaign_m_Detail');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MembersZOrgChartTable extends Migration
{
    public function up()
    {
        Schema::create('Members_z_OrgChart', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rhq', 4);
            $table->string('rhqabbv', 3);
            $table->string('zoneabbv', 4);
            $table->string('zone', 150);
            $table->string('chapabbv', 4);
            $table->string('chapter', 150);
            $table->integer('district');
            $table->string('day', 4);
            $table->string('language', 1);
            $table->string('time', 4);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Members_z_OrgChart created!");
    }

    public function down()
    {
        Schema::dropIfExists('Members_z_OrgChart');
        Log::warning("[Migration] Table Members_z_OrgChart deleted!");
    }
}

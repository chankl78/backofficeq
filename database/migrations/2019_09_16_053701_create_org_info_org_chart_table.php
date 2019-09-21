<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgInfoOrgChartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_info_org_chart', function (Blueprint $table) {
            $table->unsignedBigInteger('org_info_id');
            $table->unsignedBigInteger('org_chart_id');
            $table->foreign('org_info_id')
                ->references('id')
                ->on('members_ssa_org_infos')
                ->onDelete('cascade');

            $table->foreign('org_chart_id')
                ->references('id')
                ->on('org_charts')
                ->onDelete('cascade');

            $table->primary(['org_info_id', 'org_chart_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('org_info_org_chart');
    }
}

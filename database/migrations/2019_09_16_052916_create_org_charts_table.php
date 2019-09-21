<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_charts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rhq')->nullable();
            $table->string('rhq_abbr')->nullable();
            $table->string('zone');
            $table->string('zone_abbr');
            $table->string('chapter');
            $table->string('chapter_abbr')->nullable();
            $table->string('district')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('org_charts');
    }
}

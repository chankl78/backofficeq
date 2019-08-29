<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('resourcegroup', 150)->index();
            $table->string('prefix', 10)->nullable();
            $table->string('postfix', 10)->nullable();
            $table->string('code', 10)->unique();
            $table->binary('enabled');
            $table->binary('trial')->nullable();
            $table->binary('trialstartdate')->nullable();
            $table->binary('trialenddate')->nullable();
            $table->string('applicationversion', 10)->nullable();
            $table->string('databaseversion', 10)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_groups');
    }
}

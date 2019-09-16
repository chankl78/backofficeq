<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupZContactGroupTable extends Migration
{
    public function up()
    {
        Schema::create('Group_z_ContactGroup', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->integer('groupid');
            $table->string('value', 20);
            $table->string('valuename', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Group_z_ContactGroup created!");
    }

    public function down()
    {
        Schema::dropIfExists('Group_z_ContactGroup');
        Log::warning("[Migration] Table Group_z_ContactGroup deleted!");
    }
}

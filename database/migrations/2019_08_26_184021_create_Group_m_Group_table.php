<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupMGroupTable extends Migration
{
    public function up()
    {
        Schema::create('Group_m_Group', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->string('name', 150);
            $table->string('grouptype', 20);
            $table->string('divisiontype', 15)->nullable();
            $table->date('groupformed')->nullable();
            $table->date('groupceased')->nullable();
            $table->text('description')->nullable();
            $table->string('Status', 20)->default('Active');
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Group_m_Group created!");
    }

    public function down()
    {
        Schema::dropIfExists('Group_m_Group');
        Log::warning("[Migration] Table Group_m_Group deleted!");
    }
}

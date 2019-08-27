<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupZGroupTypeTable extends Migration
{
    public function up()
    {
        Schema::create('Group_z_GroupType', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Group_z_GroupType created!");

    }

    public function down()
    {
        Schema::dropIfExists('Group_z_GroupType');
        Log::warning("[Migration] Table Group_z_GroupType deleted!");
    }
}

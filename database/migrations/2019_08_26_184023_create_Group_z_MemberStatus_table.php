<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupZMemberStatusTable extends Migration
{
    public function up()
    {
        Schema::create('Group_z_MemberStatus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Group_z_MemberStatus created!");

    }

    public function down()
    {
        Schema::dropIfExists('Group_z_MemberStatus');
        Log::warning("[Migration] Table Group_z_MemberStatus deleted!");
    }
}

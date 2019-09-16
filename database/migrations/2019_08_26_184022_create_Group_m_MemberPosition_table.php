<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupMMemberPositionTable extends Migration
{
    public function up()
    {
        Schema::create('Group_m_MemberPosition', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->integer('groupmemberid');
            $table->date('appointeddate')->nullable();
            $table->date('graduateddate')->nullable();
            $table->string('position', 50)->default('Member');
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Group_m_MemberPosition created!");
    }

    public function down()
    {
        Schema::dropIfExists('Group_m_MemberPosition');
        Log::warning("[Migration] Table Group_m_MemberPosition deleted!");
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupMMemberTable extends Migration
{
    public function up()
    {
        Schema::create('Group_m_Member', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->integer('personid')->default(0);
            $table->integer('memberid')->default(0);
            $table->integer('groupid')->default(0);
            $table->string('groupname', 150);
            $table->string('contactgroup', 20)->nullable();
            $table->string('name', 150);
            $table->string('discussionmeetingday', 4)->nullable();
            $table->string('rhq', 2)->nullable();
            $table->string('zone', 4)->nullable();
            $table->string('chapter', 4)->nullable();
            $table->string('district', 2)->nullable();
            $table->string('positionorg', 3)->nullable();
            $table->string('positionlevelorg', 15)->nullable();
            $table->string('division', 3)->nullable();
            $table->date('enrolleddate')->nullable();
            $table->date('graduationdate')->nullable();
            $table->string('position', 50)->nullable()->default('Member');
            $table->text('remark')->nullable();
            $table->string('status', 20)->default('Active');
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Group_m_Member created!");
    }

    public function down()
    {
        Schema::dropIfExists('Group_m_Member');
        Log::warning("[Migration] Table Group_m_Member deleted!");
    }
}

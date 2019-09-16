<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccessMAccessRightsTable extends Migration
{
    public function up()
    {
        Schema::create('Access_m_AccessRights', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->integer('userid');
            $table->string('resourcegroup', 10);
            $table->string('resourcecode', 10);
            $table->integer('resourceid')->default(0); // For Event Usage
            $table->integer('groupid')->default(0); // For Culture / Function Group Users
            $table->integer('eventid')->default(0); // For Event
            $table->string('eventitem', 150)->nullable(); // For Event Item adminisrator
            $table->integer('accesstypeid');
            $table->binary('startdate')->nullable();
            $table->binary('enddate')->nullable();
            $table->binary('starttime')->nullable();
            $table->binary('endtime')->nullable();
            $table->binary('create');
            $table->binary('read');
            $table->binary('update');
            $table->binary('delete');
            $table->binary('void');
            $table->binary('unvoid');
            $table->binary('print');
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Access_m_AccessRights created!");
    }

    public function down()
    {
        Schema::dropIfExists('Access_m_AccessRights');
        Log::warning("[Migration] Table Access_m_AccessRights deleted!");
    }
}

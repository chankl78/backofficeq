<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccessMUsersTable extends Migration
{
    public function up()
    {
        Schema::create('Access_m_User', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uniquecode');
            $table->integer('memberid')->default(0);
            $table->binary('name');
            $table->string('username')->index()->unique();
            $table->binary('email');
            $table->string('password');
            $table->binary('roleid');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('status', 20)->default('Active');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        Log::info("[Migration] Table Access_m_User created!");
    }

    public function down()
    {
        Schema::dropIfExists('Access_m_User');
        Log::warning("[Migration] Table Access_m_User deleted!");
    }
}

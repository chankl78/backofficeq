<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResets extends Migration
{
    public function up()
    {
        Schema::create('Access_m_PasswordResets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Log::info("[Migration] Table Create Password Resets created!");
    }

    public function down()
    {
        Schema::dropIfExists('Access_m_PasswordResets');
        Log::warning( "[Migration] Table Create Password Resets deleted!");
    }
}

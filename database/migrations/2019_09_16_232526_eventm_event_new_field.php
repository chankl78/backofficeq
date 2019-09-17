<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventmEventNewField extends Migration
{
    public function up()
    {
        Schema::table('Event_m_Event', function (Blueprint $table) {
            $table->boolean('takeattendance', 1) -> default(0);
        });

        DB::statement("ALTER TABLE Event_m_Event MODIFY COLUMN takeattendance BOOLEAN NOT NULL DEFAULT (0) AFTER viewattendance");

        Log::info("[Migration] Table Event_m_Event takeattendance column created!");
    }

    public function down()
    {
        Schema::table('Event_m_Event', function($table) {
            $table->dropColumn('takeattendance');
        });

        Log::warning("[Migration] Column Event_m_Event.takeattendance deleted!");
    }
}

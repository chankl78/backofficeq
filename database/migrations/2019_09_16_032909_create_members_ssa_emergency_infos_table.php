<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersSsaEmergencyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_ssa_emergency_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id')->nullable();

            $table->string('name', 255)->nullable();
            $table->string('relationship', 255)->nullable();
            $table->binary('tel')->nullable();
            $table->binary('mobile')->nullable();

            $table->timestamps();
            $table->foreign('member_id')
                ->references('id')
                ->on('members_ssa')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members_ssa_emergency_infos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersSsaOrgInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_ssa_org_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id')->nullable();

            $table->string('position')->nullable();
            $table->string('division', 3)->nullable();
            $table->string('discussion_meeting_day')->nullable();

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
        Schema::dropIfExists('members_ssa_org_infos');
    }
}

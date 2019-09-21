<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventMRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Event_m_Registration', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uniquecode');
            $table->unsignedBigInteger('eventid')->nullable();
            $table->unsignedBigInteger('memberid')->nullable();
            $table->unsignedInteger('personid')->nullable();
            $table->unsignedInteger('eventregidforward')->default(0);
            $table->unsignedInteger('cardno')->nullable();
            $table->string('auditioncode', 4)->nullable();
            $table->string('ssagroup', 150)->nullable();
            $table->string('eventitem', 150)->nullable();
            $table->string('groupcode', 5)->nullable();
            $table->string('status', 20)->default('Processing');
            $table->string('role', 150)->nullable();
            $table->string('height', 3)->nullable();
            // Questionaires
            $table->boolean('commitwedsat')->default(false);
            $table->string('studentexamperiod', 255)->nullable();
            $table->text('drugallergy')->nullable();
            $table->text('medicalhistory')->nullable();
            $table->text('travelperiod')->nullable();
            $table->boolean('hypertension')->default(false);
            $table->boolean('heartdisease')->default(false);
            $table->boolean('longtermmedication')->default(false);
            $table->boolean('goodhealth')->default(false);
            $table->string('menstrual', 255)->nullable();
            // Official Use
            // Medical
            $table->string('BPReading1', 100)->nullable();
            $table->string('BPReading2', 100)->nullable();
            $table->string('BPReading3', 100)->nullable();
            $table->string('medicalstatus', 15)->default('Not Measure');
            $table->string('medicalofficer', 150)->nullable();
            $table->string('medicalremarks', 255)->nullable();
            // Audition
            $table->string('auditionstatus', 15)->default('Not Audit');
            $table->string('trainer', 150)->nullable();
            $table->text('auditionremarks')->nullable();
            // Costumes
            $table->string('costume1', 3)->nullable();
            $table->string('costume2', 3)->nullable();
            $table->string('costume3', 3)->nullable();
            $table->string('costume4', 150)->nullable();
            $table->string('costume5', 255)->nullable();
            $table->string('costume6', 3)->nullable();
            $table->string('costume7', 3)->nullable();
            $table->string('costume8', 3)->nullable();
            $table->string('costume9', 3)->nullable();
            $table->string('shoes', 3)->nullable();
            // Others
            $table->text('otherremarks')->nullable();
            $table->string('committeemember', 150)->nullable();
            $table->string('introducer', 150)->nullable();
            $table->binary('introducermobile');
            $table->timestamps();
            $table->softDeletes();

            /*$table->foreign('eventid')
                ->on('Event_m_Event')
                ->references('id');
            $table->foreign('memberid')
                ->on('Members_m_SSA')
                ->references('id');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Event_m_Registration');
    }
}

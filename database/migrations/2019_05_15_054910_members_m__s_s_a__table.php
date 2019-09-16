<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MembersMSSATable extends Migration
{
    public function up()
    {
        Schema::create('Members_m_SSA', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uniquecode');
            $table->uuid('mmsuuid')->nullable();
            $table->integer('personid')->nullable();
            $table->index('personid');
            $table->unique('personid');
            $table->string('searchcode', 3);
            $table->string('name', 150);
            $table->string('chinesename', 255)->nullable();
            $table->date('dateofbirth')->nullable();
            $table->string('classification', 4)->nullable();
            $table->string('rhq', 2)->nullable();
            $table->string('zone', 4)->nullable();
            $table->string('chapter', 4)->nullable();
            $table->string('district', 2)->nullable();
            $table->string('position', 5)->nullable();
            $table->string('division', 4)->nullable();
            $table->string('lengthofpractise', 2)->nullable();
            $table->string('language', 25)->nullable();
            $table->string('occupation', 150)->nullable();
            $table->string('countryofbirth', 150)->nullable();
            $table->string('nationality', 150)->nullable();
            $table->string('race', 150)->nullable();
            $table->string('bloodgroup', 3)->nullable();
            $table->boolean('nodrugallergy', 1)->default(0);
            $table->text('drugallergy')->nullable();
            $table->integer('introducerid')->default(0);
            $table->string('introducer', 150)->nullable();
            $table->string('emergencyname', 255)->nullable();
            $table->string('emergencyrelationship', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Log::info("[Migration] Table Members_m_SSA created!");
    }

    public function down()
    {
        Schema::dropIfExists('Members_m_SSA');
        Log::warning("[Migration] Table Members_m_SSA deleted!");
    }
}

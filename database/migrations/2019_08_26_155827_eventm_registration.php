<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventmRegistration extends Migration
{
    public function up()
    {
        Schema::create('Event_m_Registration', function(Blueprint $table)
		{
            $table->increments('id');
            $table->uuid('uniquecode');
			$table->integer('eventid');
			$table->integer('memberid');
			$table->integer('personid') -> default(0);
            $table->integer('eventregidforward') -> default(0);
            $table->integer('eventidforward') -> default(0);
            $table->string('auditioncode', 4) -> nullable();

            // SSA Culture & Function Group
            $table->integer('ssagroupid')-> default(0);
            $table->string('ssagroup', 150) -> nullable();
            $table->string('ssagroupcontact', 150) -> nullable();
            $table->text('ssagrouplistall') -> nullable();
            
			$table->string('eventitem', 150) -> nullable();
            $table->integer('cardno')-> nullable();
            
			$table->string('name', 150);
			$table->string('chinesename', 255);
			$table->string('gender', 1) -> nullable();
			$table->string('rhq', 2) -> nullable();
			$table->string('zone', 4) -> nullable();
			$table->string('chapter', 4) -> nullable();
			$table->string('district', 2) -> nullable();
            $table->string('position', 10) -> nullable();
            $table->string('positionlevel', 25) -> nullable();
            $table->string('division', 3) -> nullable();
            $table->string('discussionmeetingday', 4) -> nullable();
            
			$table->string('role', 150) -> default('Participant');
            $table->date('dateofbirth') -> nullable();
            $table->string('dateofbirthtxt', 6) -> nullable();

            // For NDP or other culture event use
            $table->string('groupcodeprefix', 11) -> nullable();
            $table->string('groupcode', 11) -> nullable();
            
            // For Study Exam usage
            $table->string('language', 5) -> nullable();
            $table->string('session', 50) -> nullable();
            $table->string('studyexamstatus', 10) -> default('Processing');
            $table->string('studyexamgrade', 10) -> nullable();

            $table->string('status', 20) -> default('Processing');
            
			// For New Friend uses in event
			$table->string('occupation', 150) -> nullable();
			$table->string('countryofbirth', 150) -> nullable();
			$table->string('nationality', 150) -> nullable();
			$table->string('race', 150) -> nullable();
            $table->string('bloodgroup', 3) -> nullable();
            
			// Need to include the neccessary information like Shoes Size, Shirt Size & So on
            $table->string('height', 3) -> nullable();
            
			// Questionaires
			$table->boolean('commitwedsat', 1) -> default(1);
			$table->string('studentexamperiod', 255) -> nullable();
			$table->text('drugallergy') -> nullable();
			$table->text('medicalhistory') -> nullable();
			$table->text('travelperiod') -> nullable();
			// Emergency Contact
			$table->string('emergencyname', 255) -> nullable();
			$table->string('emergencyrelationship', 255) -> nullable();
			// Health Status
			$table->boolean('hypertension', 1) -> default(0);
			$table->boolean('heartdisease', 1) -> default(0);
			$table->boolean('longtermmedication', 1) -> default(0);
			$table->boolean('goodhealth', 1) -> default(1);
			$table->string('menstrual', 255) -> nullable();
			// Medical
			$table->string('BPReading1', 100) -> nullable();
			$table->string('BPReading2', 100) -> nullable();
			$table->string('BPReading3', 100) -> nullable();
			$table->string('medicalstatus', 15) -> default('Not Measure');
			$table->string('medicalofficer', 150) -> nullable();
            $table->string('medicalremarks', 255) -> nullable();
            
			// Audition
			$table->string('auditionstatus', 15) -> default('Not Audit');
			$table->string('trainer', 150) -> nullable();
            $table->text('auditionremarks') -> nullable();
            
			// Costumes
			$table->string('costume1', 3) -> nullable();
			$table->string('costume2', 10) -> nullable();
			$table->string('costume3', 4) -> nullable();
			$table->string('costume4', 150) -> nullable();
			$table->string('costume5', 255) -> nullable();
			$table->string('costume6', 20) -> nullable();
			$table->string('costume7', 20) -> nullable();
			$table->string('costume8', 20) -> nullable();
			$table->string('costume9', 20) -> nullable();
            $table->string('shoes', 3) -> nullable();
            
			// Others
            $table->text('otherremarks') -> nullable();
            $table->text('remarks') -> nullable();
			$table->string('committeemember', 150) -> nullable();
            $table->string('introducer', 150) -> nullable();
            
            // pdpa and Subscription
            $table->date('subscriptionreceiveddate') -> nullable();
            $table->boolean('subscriptioncl', 1) -> default(0);
            $table->boolean('subscriptionst', 1) -> default(0);
            $table->date('clstartdate') -> nullable();
            $table->date('clenddate') -> nullable();
            $table->date('ststartdate') -> nullable();
            $table->date('stenddate') -> nullable();
            $table->string('subscriptionstatus', 20) -> default("Active");

            // Gohonzon Application
            $table->date('gohonzonapplicationrecddate') -> nullable();
            $table->string('gohonzontype', 25) -> nullable();
            $table->string('gohonzonrecdmonth', 2) -> nullable();
            $table->string('gohonzonrecdyear', 4) -> nullable();
            $table->string('gohonzonstatus', 20) -> default("Pending");
            $table->text('gohonzonremarks') -> nullable();

            // Checkbox for strange usage for 1 time event
            $table->boolean('check1', 1) -> default(0);
			$table->boolean('check2', 1) -> default(0);
            $table->boolean('check3', 1) -> default(0);

			$table->timestamps();
			$table->softDeletes();
        });
        
        Log::info("[Migration] Table Event_m_Registration created!");
    }

    public function down()
    {
        Schema::dropIfExists('Event_m_Registration');
        Log::warning("[Migration] Table Event_m_Registration deleted!");
    }
}

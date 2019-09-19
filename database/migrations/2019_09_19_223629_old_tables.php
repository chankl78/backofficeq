<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OldTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create Staff
        Schema::create('Staff_m_Staff', function($table)
        {
            $table->increments('id');
            $table->string('name', 150)->index();
            $table->string('uniquecode', 25);
            $table->binary('address')->nullable();
            $table->binary('postalcode')->nullable();
            $table->binary('tel')->nullable();
            $table->string('teloffice', 10)->nullable();
            $table->binary('mobile')->nullable();
            $table->binary('email')->nullable();
            $table->string('stafftype', 20)->default('Full-Time');
			$table->string('department', 20)->default('General Admin');
			$table->string('position', 20)->default('Staff');
			$table->string('status', 20)->default('Active');
			$table->timestamps();
			$table->softDeletes();
		});
        Schema::create('Staff_z_Department', function($table)
        {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Staff_z_Position', function($table)
        {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Staff_z_Type', function($table)
        {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Staff_z_Status', function($table)
        {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });
        // Create Common Tables
        Schema::create('Common_z_Status', function($table)
        {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });
        // Default Configuration
        Schema::create('Configuration_m_Company', function($table)
        {
            $table->increments('id');
            $table->string('name', 150)->index();
            $table->string('address', 250)->nullable();
            $table->string('postalcode', 6)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('tel', 10)->nullable();
            $table->string('fax', 10)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('uenno', 50)->nullable();
            $table->string('gstno', 50)->nullable();
            $table->binary('logo')->nullable();
            $table->string('googlemap')->nullable();
            $table->string('status', 20)->default('Active');
			$table->timestamps();
			$table->softDeletes();
		});
        Schema::create('Configuration_m_Branch', function($table)
        {
            $table->increments('id');
            $table->string('prefix', 10)->nullable();
            $table->string('postfix', 10)->nullable();
            $table->string('code', 10);
            $table->string('name', 150)->index();
            $table->string('address', 250)->nullable();
            $table->string('postalcode', 6)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('tel', 10)->nullable();
            $table->string('fax', 10)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('googlemap')->nullable();
            $table->string('status', 20)->default('Active');
			$table->timestamps();
			$table->softDeletes();
		});
        Schema::create('Configuration_m_Default', function($table)
        {
            $table->increments('id');
            $table->string('description', 150);
            $table->string('value', 150);
            $table->string('key', 10);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Configuration_m_License', function($table)
        {
            $table->increments('id');
            $table->binary('company');
            $table->binary('licenseno');
            $table->binary('noofusers'); // 0 = unlimited
            $table->binary('noofbranches'); // 0 = unlimited
            $table->binary('trial')->nullable();
            $table->binary('trialstartdate')->nullable();
            $table->binary('trialenddate')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        // Vehicle
        Schema::create('Vehicle_m_Booking', function($table)
        {
            $table->increments('id');
            $table->date('bookingdate')->index();
            $table->time('starttime')->index();
            $table->time('endtime')->index();
            $table->string('vehicleno', 10);
            $table->string('bookbyname', 150);
            $table->string('drivebyname', 150)->nullable();
            $table->string('event', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('route', 255);
            $table->string('approvedby', 150);
            $table->string('approveddatetime', 150);
            $table->boolean('Overnight')->default(0);
			$table->string('Overnightapprovedby', 150);
			$table->string('status', 20)->default('Processing');
			$table->text('remark');
			$table->dateTime('vehiclecheckout')->nullable();
			$table->dateTime('vehiclecheckin')->nullable();
			$table->integer('previousmilage')->nullable();
			$table->integer('lastmilage')->nullable();
			$table->decimal('cashcardvalue', 8, 2)->default(0);
			$table->boolean('lowparkingcoupons')->default(0);
			$table->boolean('lowfuel')->default(0);
			$table->timestamps();
			$table->softDeletes();
		});
        Schema::create('Vehicle_z_Driver', function($table)
        {
            $table->increments('id');
            $table->string('value', 150);
            $table->string('vehicleno', 10)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Vehicle_z_BookingStatus', function($table)
        {
            $table->increments('id');
            $table->string('value', 150);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Vehicle_m_CashCard', function($table)
        {
            $table->increments('id');
            $table->string('description', 150);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Vehicle_m_CashCard_Topup', function($table)
        {
            $table->increments('id');
            $table->date('topupdate');
            $table->string('description', 255);
            $table->decimal('topupvalue', 8, 2);
            $table->decimal('finalbalance', 8, 2);
            $table->string('topupby', 150);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Vehicle_m_Vehicle', function($table)
        {
            $table->increments('id');
            $table->string('vehicleno', 10);
            $table->string('status', 10);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Vehicle_m_VehicleMaintenance', function($table)
        {
            $table->increments('id');
            $table->string('vehicleno', 10);
            $table->date('maintenancedate');
            $table->string('maintenancetype', 50);
            $table->text('description');
            $table->decimal('cost', 8, 2);
            $table->string('sendby', 150);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Vehicle_z_MaintenanceType', function($table)
        {
            $table->increments('id');
            $table->string('value', 50);
            $table->timestamps();
            $table->softDeletes();
        });
        // Event
        Schema::create('Event_m_Event', function($table)
        {
            $table->increments('id');
            $table->string('uniquecode', 25);
            $table->date('eventdate')->index();
            $table->string('location', 255);
            $table->string('eventtype', 50);
            $table->string('createby', 150);
            $table->boolean('pdpanric', 1)->default(0);
			$table->boolean('pdpaaddress', 1)->default(0);
			$table->boolean('pdpatelmobileemail', 1)->default(0);
			$table->boolean('memregistration', 1)->default(0);
			$table->text('description')->nullable();
			$table->string('status', 20)->default('Active');
			$table->timestamps();
			$table->softDeletes();
		});
        Schema::create('Event_m_Registration', function($table)
        {
            $table->increments('id');
            $table->integer('eventid');
            $table->integer('memberid');
            $table->integer('personid')->nullable();
            $table->string('uniquecode', 25);
            $table->integer('eventregidforward')->default(0);
			$table->string('auditioncode', 4)->nullable();
			$table->string('ssagroup', 150)->nullable();
			$table->string('eventitem', 150)->nullable();
			$table->integer('cardno')-> nullable();;
			$table->string('name', 150);
			$table->string('chinesename', 255);
			$table->string('gender', 1)->nullable();
			$table->string('rhq', 2)->nullable();
			$table->string('zone', 4)->nullable();
			$table->string('chapter', 4)->nullable();
			$table->string('district', 2)->nullable();
			$table->string('position', 10)->nullable();
			$table->string('division', 3)->nullable();
			$table->string('role', 150)->nullable();
			$table->date('dateofbirth')->nullable();
			$table->binary('nric')->nullable();
			$table->binary('tel')->nullable();
			$table->binary('mobile')->nullable();
			$table->binary('email')->nullable();
			$table->binary('address')->nullable();
			$table->binary('buildingname')->nullable();
			$table->binary('unitno')->nullable();
			$table->binary('postalcode')->nullable();
			$table->string('groupcode', 5)->nullable(); // For NDP or other culture event use
			$table->string('language', 5)->nullable(); // For Study Exam usage
			$table->string('status', 20)->default('Processing');
			// For New Friend uses in event
			$table->string('occupation', 150)->nullable();
			$table->string('countryofbirth', 150)->nullable();
			$table->string('nationality', 150)->nullable();
			$table->string('race', 150)->nullable();
			$table->string('bloodgroup', 3)->nullable();
			// Need to include the neccessary information like Shoes Size, Shirt Size & So on
			$table->string('height', 3)->nullable();
			// Questionaires
			$table->boolean('commitwedsat', 1)->default(1);
			$table->string('studentexamperiod', 255)->nullable();
			$table->text('drugallergy')->nullable();
			$table->text('medicalhistory')->nullable();
			$table->text('travelperiod')->nullable();
			// Emergency Contact
			$table->string('emergencyname', 255)->nullable();
			$table->string('emergencyrelationship', 255)->nullable();
			$table->binary('emergencytel')->nullable();
			$table->binary('emergencymobile')->nullable();
			// Health Status
			$table->boolean('hypertension', 1)->default(0);
			$table->boolean('heartdisease', 1)->default(0);
			$table->boolean('longtermmedication', 1)->default(0);
			$table->boolean('goodhealth', 1)->default(1);
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
		});
        Schema::create('Event_m_Group', function($table)
        {
            $table->increments('id');
            $table->integer('eventid');
            $table->string('uniquecode', 15);
            $table->string('groupid', 15);
            $table->string('name', 150);
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Event_m_EventItem', function($table)
        {
            $table->increments('id');
            $table->integer('eventid');
            $table->string('name', 150);
            $table->string('uniquecode', 25);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Event_z_EventType', function($table)
        {
            $table->increments('id');
            $table->string('value', 50);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Event_z_Language', function($table)
        {
            $table->increments('id');
            $table->string('value', 50);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Event_z_RegistrationStatus', function($table)
        {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Event_z_Role', function($table)
        {
            $table->increments('id');
            $table->string('abbv', 50)->nullable();
            $table->string('value', 50);
            $table->timestamps();
            $table->softDeletes();
        });
        // Attendance
        Schema::create('Attendance_m_Attendance', function($table)
        {
            $table->increments('id');
            $table->date('attendancedate')->index();
            $table->time('attendancetime')->index();
            $table->text('description');
            $table->string('createbyname', 150);
            $table->integer('eventid')->nullable();
            $table->string('event', 150)->nullable();
            $table->string('attendancetype', 20)->default('Actual');
			$table->string('status', 20)->default('Active');
			$table->timestamps();
			$table->softDeletes();
		});
        Schema::create('Attendance_m_Person', function($table)
        {
            $table->increments('id');
            $table->integer('attendanceid');
            $table->integer('eventregid')->default(0);
			$table->integer('memberid');
			$table->string('name', 150);
			$table->string('rhq', 2)->nullable();
			$table->string('zone', 4)->nullable();
			$table->string('chapter', 4)->nullable();
			$table->string('district', 2)->nullable();
			$table->string('division', 3)->nullable();
			$table->string('position', 3)->nullable();
			$table->boolean('attended', 1)->default(0);
			$table->timestamps();
			$table->softDeletes();
		});
        Schema::create('Attendance_z_Type', function($table)
        {
            $table->increments('id');
            $table->string('value', 20);
            $table->string('description', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Attendance_z_Status', function($table)
        {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Members_m_SSA', function($table)
        {
            $table->increments('id');
            $table->integer('personid')->nullable();
            $table->index('personid');
            $table->unique('personid');
            $table->string('searchcode', 3);
            $table->string('uniquecode', 25);
            $table->string('name', 150);
            $table->string('chinesename', 255) ->nullable();
            $table->date('dateofbirth')->nullable();
            $table->string('classification', 4)->nullable();
            $table->string('rhq', 2)->nullable();
            $table->string('zone', 4)->nullable();
            $table->string('chapter', 4)->nullable();
            $table->string('district', 2)->nullable();
            $table->string('position', 3)->nullable();
            $table->string('division', 4)->nullable();
            $table->binary('nric')->nullable();
            $table->binary('tel')->nullable();
            $table->binary('mobile')->nullable();
            $table->binary('email')->nullable();
            $table->binary('address')->nullable();
            $table->binary('buildingname')->nullable();
            $table->binary('unitno')->nullable();
            $table->binary('postalcode')->nullable();
            $table->string('lengthofpractise', 2)->nullable();
            $table->string('language', 25)->nullable();
            $table->string('occupation', 150)->nullable();
            $table->string('countryofbirth', 150)->nullable();
            $table->string('nationality', 150)->nullable();
            $table->string('race', 150)->nullable();
            $table->string('bloodgroup', 3)->nullable();
            $table->boolean('nodrugallergy', 1)->default(0);
			$table->text('drugallergy')->nullable();
			$table->string('introducer', 150)->nullable();
			$table->binary('introducermobile');
			$table->string('emergencyname', 255)->nullable();
			$table->string('emergencyrelationship', 255)->nullable();
			$table->binary('emergencytel')->nullable();
			$table->binary('emergencymobile')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});

        Schema::create('Members_m_MedicalHistory', function($table)
        {
            $table->increments('id');
            $table->integer('memberid');
            $table->integer('personid')->nullable();
            $table->string('event', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('action')->nullable();
            $table->text('Remark')->nullable();
            $table->string('createby', 150);
            $table->string('handleby', 150);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Members_m_Request', function($table)
        {
            $table->increments('id');
            $table->integer('memberid');
            $table->integer('personid')->nullable();
            $table->index('personid');
            $table->string('uniquecode', 25);
            $table->string('name', 150);
            $table->string('rhq', 2)->nullable();
            $table->string('zone', 4)->nullable();
            $table->string('chapter', 4)->nullable();
            $table->string('district', 2)->nullable();
            $table->string('position', 3)->nullable();
            $table->string('division', 4)->nullable();
            $table->binary('nric')->nullable();
            $table->binary('tel')->nullable();
            $table->binary('mobile')->nullable();
            $table->binary('email')->nullable();
            $table->binary('address')->nullable();
            $table->binary('postalcode')->nullable();
            $table->string('createby', 150);
            $table->string('handleby', 150);
            $table->text('Remark')->nullable();
            $table->string('status', 20);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Members_z_OrgChart', function($table)
        {
            $table->increments('id');
            $table->string('rhq', 4)->nullable();
            $table->string('rhqabbv', 3)->nullable();
            $table->string('zoneabbv', 4);
            $table->string('zone', 150);
            $table->string('chapabbv', 4);
            $table->string('chapter', 150);
            $table->integer('district')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Members_z_Position', function($table)
        {
            $table->increments('id');
            $table->string('code', 10);
            $table->string('name', 255);
            $table->string('level', 25);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Members_z_Status', function($table)
        {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Group_m_Group', function($table)
        {
            $table->increments('id');
            $table->string('uniquecode', 15)->unique();
            $table->string('name', 150);
            $table->string('grouptype', 20);
            $table->date('groupformed')->nullable();
            $table->date('groupceased')->nullable();
            $table->text('description')->nullable();
            $table->string('Status', 20)->default('Active');
			$table->timestamps();
			$table->softDeletes();
		});
        Schema::create('Group_m_Member', function($table)
        {
            $table->increments('id');
            $table->integer('personid')->default('0');
			$table->index('personid');
			$table->integer('memberid')->default('0');
			$table->integer('groupid')->default('0');
			$table->string('uniquecode', 25)->unique();
			$table->string('name', 150);
			$table->string('rhq', 2)->nullable();
			$table->string('zone', 4)->nullable();
			$table->string('chapter', 4)->nullable();
			$table->string('district', 2)->nullable();
			$table->string('positionorg', 3)->nullable();
			$table->string('division', 3)->nullable();
			$table->date('enrolleddate')->nullable();
			$table->date('graduationdate')->nullable();
			$table->string('position', 50)->default('Member');
			$table->text('remark')->nullable();
			$table->string('status', 20)->default('Active');
			$table->timestamps();
			$table->softDeletes();
		});
        Schema::create('Group_m_MemberPosition', function($table)
        {
            $table->increments('id');
            $table->integer('groupmemberid');
            $table->date('appointeddate')->nullable();
            $table->date('graduateddate')->nullable();
            $table->string('position', 50)->default('Member');
			$table->string('uniquecode', 25)->unique();
			$table->timestamps();
			$table->softDeletes();
		});
        Schema::create('Group_z_MemberStatus', function($table)
        {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Group_z_Position', function($table)
        {
            $table->increments('id');
            $table->integer('groupid');
            $table->string('value', 20);
            $table->integer('lineno')->default('0');
			$table->timestamps();
			$table->softDeletes();
		});
        Schema::create('Group_z_Status', function($table)
        {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Group_z_GroupType', function($table)
        {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Award_m_Award', function($table)
        {
            $table->increments('id');
            $table->string('uniquecode', 15)->unique();
            $table->string('awardtitle', 150);
            $table->string('awardtype', 25);
            $table->string('awardby', 150);
            $table->string('country', 150);
            $table->string('eventid', 15);
            $table->date('awarddate')->nullable();
            $table->text('description')->nullable();
            $table->string('Status', 20)->default('Active');
			$table->timestamps();
			$table->softDeletes();
		});
        Schema::create('Award_m_Detail', function($table)
        {
            $table->increments('id');
            $table->integer('personid')->default('0');
			$table->integer('memberid')->default('0');
			$table->integer('awardid')->default('0');
			$table->string('uniquecode', 25)->unique();
			$table->string('name', 150);
			$table->date('awarddate')->nullable();
			$table->string('rhq', 2)->nullable();
			$table->string('zone', 4)->nullable();
			$table->string('chapter', 4)->nullable();
			$table->string('district', 2)->nullable();
			$table->string('position', 3)->nullable();
			$table->string('division', 4)->nullable();
			$table->text('remarks')->nullable();
			$table->string('status', 20)->default('Active');
			$table->timestamps();
			$table->softDeletes();
		});
        Schema::create('Award_z_Type', function($table)
        {
            $table->increments('id');
            $table->string('value', 20);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('Print_m_Print', function($table)
        {
            $table->increments('id');
            $table->integer('userid');
            $table->integer('resourceid');
            $table->integer('resourcecodeid');
            $table->string('uniquecode', 25)->nullable();
            $table->string('string1', 255)->nullable();
            $table->string('string2', 255)->nullable();
            $table->string('string3', 255)->nullable();
            $table->string('string4', 255)->nullable();
            $table->string('string5', 255)->nullable();
            $table->string('string6', 255)->nullable();
            $table->string('string7', 255)->nullable();
            $table->string('string8', 255)->nullable();
            $table->string('string9', 255)->nullable();
            $table->string('string10', 255)->nullable();
            $table->string('string11', 255)->nullable();
            $table->string('string12', 255)->nullable();
            $table->string('string13', 255)->nullable();
            $table->string('string14', 255)->nullable();
            $table->string('string15', 255)->nullable();
            $table->timestamps();
        });
        Schema::create('Print_m_SecurityPass', function($table)
        {
            $table->increments('id');
            $table->integer('userid');
            $table->integer('eventid');
            $table->integer('eventdetailid');
            $table->string('name', 255)->nullable();
            $table->string('rhq', 4)->nullable();
            $table->string('zone', 4)->nullable();
            $table->string('chapter', 4)->nullable();
            $table->string('district', 2)->nullable();
            $table->timestamps();
        });
        Schema::create('Configuration_m_Password_Reminders', function(Blueprint $table)
        {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Print
        Schema::dropIfExists('Print_m_SecurityPass');
        Schema::dropIfExists('Print_m_Print');
        // Configuration
        Schema::dropIfExists('Configuration_m_Password_Reminders');
        // Delete Awards
        Schema::dropIfExists('Award_z_Type');
        Schema::dropIfExists('Award_m_Detail');
        Schema::dropIfExists('Award_m_Award');
        // Delete Groups
        Schema::dropIfExists('Group_z_GroupType');
        Schema::dropIfExists('Group_z_Status');
        Schema::dropIfExists('Group_z_Position');
        Schema::dropIfExists('Group_z_MemberStatus');
        Schema::dropIfExists('Group_m_MemberPosition');
        Schema::dropIfExists('Group_m_Member');
        Schema::dropIfExists('Group_m_Group');
        // Delete Members
        Schema::dropIfExists('Members_z_Status');
        Schema::dropIfExists('Members_m_Request');
        Schema::dropIfExists('Members_m_SSA');
        // Delete Attendance
        Schema::dropIfExists('Attendance_z_Status');
        Schema::dropIfExists('Attendance_z_Type');
        Schema::dropIfExists('Attendance_m_Person');
        Schema::dropIfExists('Attendance_m_Attendance');
        // Delete Event
        Schema::dropIfExists('Event_z_RegistrationStatus');
        Schema::dropIfExists('Event_z_Language');
        Schema::dropIfExists('Event_z_EventType');
        Schema::dropIfExists('Event_m_EventItem');
        Schema::dropIfExists('Event_m_Group');
        Schema::dropIfExists('Event_m_Registration');
        Schema::dropIfExists('Event_m_Event');
        // Delete Vehicle
        Schema::dropIfExists('Vehicle_z_MaintenanceType');
        Schema::dropIfExists('Vehicle_m_VehicleMaintenance');
        Schema::dropIfExists('Vehicle_m_Vehicle');
        Schema::dropIfExists('Vehicle_m_CashCard_Topup');
        Schema::dropIfExists('Vehicle_m_CashCard');
        Schema::dropIfExists('Vehicle_z_BookingStatus');
        Schema::dropIfExists('Vehicle_z_Driver');
        Schema::dropIfExists('Vehicle_m_Booking');
        // Delete Logs
        Schema::dropIfExists('Logs_z_LogType');
        Schema::dropIfExists('Logs_m_Logs');
        // Delete Configuration Tables
        Schema::dropIfExists('Configuration_m_Resource');
        Schema::dropIfExists('Configuration_m_ResourceGroup');
        Schema::dropIfExists('Configuration_m_License');
        Schema::dropIfExists('Configuration_m_Default');
        Schema::dropIfExists('Configuration_m_Branch');
        Schema::dropIfExists('Configuration_m_Company');
        // Delete Common Tables
        Schema::dropIfExists('Common_z_Status');
        // Delete Staff
        Schema::dropIfExists('Staff_z_Status');
        Schema::dropIfExists('Staff_z_Type');
        Schema::dropIfExists('Staff_z_Position');
        Schema::dropIfExists('Staff_z_Department');
        Schema::dropIfExists('Staff_m_Staff');
        // Delete Access Rights
        Schema::dropIfExists('Access_z_Status');
        Schema::dropIfExists('Access_z_Roles');
        Schema::dropIfExists('Access_z_AccessTypes');
        Schema::dropIfExists('Access_m_Users');
        Schema::dropIfExists('Access_m_AccessRights');
    }
}

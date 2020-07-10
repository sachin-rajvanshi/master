<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->longText('profile_pic');
            $table->string('college_enrollment_number');
            $table->string('university_enrollment_number');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('dob');
            $table->string('mobile_number');
            $table->string('email');
            $table->enum('gender', ['Male','Female'])->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
            $table->longText('current_address');
            $table->bigInteger('id_type')->unsigned();
            $table->foreign('id_type')
                ->references('id')->on('id_types')
                ->onDelete('cascade');
            $table->string('id_number');
            $table->string('nationality');
            $table->bigInteger('state_id')->unsigned();
            $table->foreign('state_id')
                ->references('id')->on('states')
                ->onDelete('cascade');
            $table->bigInteger('city_id')->unsigned();
            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('cascade');
            $table->string('pin_code');
            $table->string('father_name');
            $table->string('father_mobile_number');
            $table->string('father_occupation');
            $table->string('mother_name');
            $table->string('mother_mobile_number')->nullable();
            $table->string('mother_occupation');
            $table->string('high_school_passing_year');
            $table->string('high_school_passing_board');
            $table->string('high_school_percentage');
            $table->longText('high_school_file');
            $table->string('sr_secondry_passing_year');
            $table->string('sr_secondry_passing_board');
            $table->string('sr_secondry_percentage');
            $table->longText('sr_secondry_file');
            $table->string('graduation_passing_year')->nullable();
            $table->string('graduation_passing_board')->nullable();
            $table->string('graduation_percentage')->nullable();
            $table->longText('graduation_file')->nullable();
            $table->string('post_graduation_passing_year')->nullable();
            $table->string('post_graduation_passing_board')->nullable();
            $table->string('post_graduation_percentage')->nullable();
            $table->longText('post_graduation_file')->nullable();
            $table->string('m_phil_passing_year')->nullable();
            $table->string('m_phil_passing_board')->nullable();
            $table->string('m_phil_percentage')->nullable();
            $table->longText('m_phil_file')->nullable();
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('cascade');
            $table->bigInteger('branch_id')->unsigned();
            $table->foreign('branch_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->bigInteger('study_mode_id')->unsigned();
            $table->foreign('study_mode_id')
                ->references('id')->on('course_wises')
                ->onDelete('cascade');
            $table->bigInteger('mode_of_entry_id')->unsigned();
            $table->foreign('mode_of_entry_id')
                ->references('id')->on('mode_of_entries')
                ->onDelete('cascade');
            $table->bigInteger('university_id')->unsigned();
            $table->foreign('university_id')
                ->references('id')->on('universities')
                ->onDelete('cascade');
            $table->bigInteger('session_id')->unsigned();
            $table->foreign('session_id')
                ->references('id')->on('sessions')
                ->onDelete('cascade');
            $table->bigInteger('mode_of_study_id')->unsigned();
            $table->foreign('mode_of_study_id')
                ->references('id')->on('mode_of_studies')
                ->onDelete('cascade');
            $table->string('consultant_code')->nullable();
            $table->string('consultant_name')->nullable();
            $table->string('consultant_mobile_number')->nullable();
            $table->string('consultant_address')->nullable();
            $table->string('admission_fees')->nullable();
            $table->longText('aadhar_card');
            $table->longText('signature');
            $table->bigInteger('course_completion_id')->unsigned();
            $table->foreign('course_completion_id')
                ->references('id')->on('course_completions')
                ->onDelete('cascade');
            $table->enum('accept_terms', ['Yes', 'No'])->default('No');
            $table->enum('status', ['Yes', 'No'])->default('Yes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admissions');
    }
}

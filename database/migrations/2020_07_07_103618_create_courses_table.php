<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('course_code');
            $table->bigInteger('course_wise_id')->unsigned();
            $table->foreign('course_wise_id')
                ->references('id')->on('course_wises')
                ->onDelete('cascade');
            $table->bigInteger('course_duration_id')->unsigned();
            $table->foreign('course_duration_id')
                ->references('id')->on('course_durations')
                ->onDelete('cascade');
            $table->bigInteger('course_type_id')->unsigned();
            $table->foreign('course_type_id')
                ->references('id')->on('course_types')
                ->onDelete('cascade');
            $table->bigInteger('course_level_id')->unsigned();
            $table->foreign('course_level_id')
                ->references('id')->on('course_levels')
                ->onDelete('cascade');
            $table->string('admission_fees')->nullable();
            $table->string('course_fees')->nullable();
            $table->string('exam_fees')->nullable();
            $table->string('itp_fees')->nullable();
            $table->string('late_fees')->nullable();
            $table->string('total_deposite_fees')->nullable();
            $table->string('hostel_facility')->nullable();
            $table->string('hostel_fees')->nullable();
            $table->string('other_fees')->nullable();
            $table->string('other_fees_remark')->nullable();
            $table->enum('status', ['Yes', 'No'])->default('No');
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
        Schema::dropIfExists('courses');
    }
}

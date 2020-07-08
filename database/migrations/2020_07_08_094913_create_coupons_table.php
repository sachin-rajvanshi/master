<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('cascade');
            $table->string('coupon_code');
            $table->string('student_mobile_no');
            $table->string('email');
            $table->string('discount');
            $table->enum('send_sms', ['Yes', 'No']);
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
        Schema::dropIfExists('coupons');
    }
}

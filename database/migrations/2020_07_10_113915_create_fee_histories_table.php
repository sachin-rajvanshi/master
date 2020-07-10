<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->bigInteger('admission_id')->unsigned()->nullable();
            $table->foreign('admission_id')
                ->references('id')->on('admissions')
                ->onDelete('cascade');
            $table->bigInteger('payment_mode_id')->unsigned();
            $table->foreign('payment_mode_id')
                ->references('id')->on('payment_modes')
                ->onDelete('cascade');
            $table->string('payable_amount');
            $table->string('paid_amount');
            $table->string('cash_collected_by')->nullable();
            $table->string('cheque_number')->nullable();
            $table->date('cheque_date')->nullable();
            $table->string('due_amount')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('reference_id')->nullable();
            $table->longText('payment_screenshot')->nullable();
            $table->string('payment_remark');
            $table->enum('payment_status', ['Paid', 'Unpaid'])->nullable();
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
        Schema::dropIfExists('fee_histories');
    }
}

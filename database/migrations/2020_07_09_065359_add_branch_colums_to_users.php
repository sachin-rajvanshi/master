<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBranchColumsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('branch_address')->nullable();
            $table->bigInteger('state_id')->unsigned()->nullable();
            $table->foreign('state_id')
                ->references('id')->on('states')
                ->onDelete('cascade');
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('cascade');
            $table->bigInteger('college_parent_id')->unsigned()->nullable();
            $table->foreign('college_parent_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_mobile')->nullable();
            $table->string('branch_code')->nullable();
            $table->enum('status', ['Yes', 'No'])->default('Yes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('state_id');
            $table->dropColumn('state_id');
            $table->dropForeign('city_id');
            $table->dropColumn('city_id');
            $table->dropForeign('college_parent_id');
            $table->dropColumn('college_parent_id');
            $table->dropColumn('branch_address');
            $table->dropColumn('contact_person_name');
            $table->dropColumn('contact_person_mobile');
            $table->dropColumn('branch_code');
            $table->dropColumn('status');
        });
    }
}

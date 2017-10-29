<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('first_name_kana');
            $table->string('last_name_kana');
            $table->string('phone');
            $table->string('birthday');
            $table->string('gender');
            $table->string('employment_status');
            $table->string('desired_job_type');
            $table->string('desired_work_area');
            $table->string('current_annual_income');
            $table->string('single_assignment');
            $table->string('working_day');
            $table->boolean('allow_mail_magazine');
            $table->boolean('auto_login');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

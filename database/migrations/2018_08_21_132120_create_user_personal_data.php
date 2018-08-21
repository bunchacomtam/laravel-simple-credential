<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPersonalData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_personal_data', function (Blueprint $table) {
            $table->increments('id');
            $table->text('address');
            $table->date('date_of_birth');
            $table->string('membership_type');
            $table->text('number_credit_card');
            $table->string('type_credit_card');
            $table->date('expired_credit_card');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->on('users')->references('id');
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
        Schema::dropIfExists('user_personal_data');
    }
}

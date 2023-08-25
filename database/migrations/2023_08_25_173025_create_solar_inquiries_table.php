<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolarInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solar_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('zip');
            $table->boolean('is_home_owner');
            $table->string('type_of_home');
            $table->string('average_monthly_bill');
            $table->string('electricity_provider');
            $table->string('shade');
            $table->string('solar_considering');
            $table->string('credit_score');
            $table->string('address');
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            
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
        Schema::dropIfExists('solar_inquiries');
    }
}

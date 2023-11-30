<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('business_name');
            $table->string('phone');
            $table->string('email');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('member_id');
            // $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            // $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            // $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('address');
            $table->bigInteger('revenue');
            $table->unsignedBigInteger('lead_stage_id');
            $table->foreign('lead_stage_id')->references('id')->on('lead_stages')->onDelete('cascade');
            $table->unsignedBigInteger('lead_status_id');
            $table->foreign('lead_status_id')->references('id')->on('lead_statuses')->onDelete('cascade');
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('call_back_time')->nullable();
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
        Schema::dropIfExists('leads');
    }
};

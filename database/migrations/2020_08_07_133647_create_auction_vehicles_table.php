<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction_vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('auction_title')->nullable();
            $table->string('stating_date')->nullable();
            $table->string('stating_time')->nullable();
            $table->string('channel_name')->nullable();
            $table->string('minimum_percentage')->nullable();
            $table->string('status')->default('0');
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
        Schema::dropIfExists('auction_vehicles');
    }
}

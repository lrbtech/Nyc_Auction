<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionVehicleIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction_vehicle_ids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('auction_id')->nullable();
            $table->string('vehicle_id')->nullable();
            $table->string('order_id')->nullable();
            $table->string('starting_price')->nullable();
            $table->string('bid_id')->nullable();
            $table->string('status')->default('0');
            $table->string('un_bid')->default('0');
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
        Schema::dropIfExists('auction_vehicle_ids');
    }
}

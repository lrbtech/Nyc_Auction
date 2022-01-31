<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lot_number')->nullable();
            $table->string('car_id')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('vehicle_model')->nullable();
            $table->string('vehicle_status')->nullable();
            $table->string('colour')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('price')->nullable();
            $table->string('minimum_bid_value')->nullable();
            $table->string('year')->nullable();
            $table->string('document_type')->nullable();
            $table->string('exterior_color')->nullable();
            $table->string('interior_color')->nullable();
            $table->string('odometer')->nullable();
            $table->string('engine_type')->nullable();
            $table->string('highlights')->nullable();
            $table->string('primary_damage')->nullable();
            $table->string('transmission')->nullable();
            $table->string('secondary_damage')->nullable();
            $table->string('cylinders')->nullable();
            $table->string('fuel')->nullable();
            $table->string('vin')->nullable();
            $table->string('keys')->nullable();
            $table->string('body_style')->nullable();
            $table->string('sales_type')->nullable();
            $table->TEXT('description',100000)->nullable();
            $table->string('is_enable_future_vehicles')->nullable();
            $table->string('is_visible_website')->nullable();
            $table->string('drive')->nullable();
            $table->string('location')->nullable();
            $table->string('image')->nullable();
            $table->string('bid_id')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('busisness_type')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address',5000)->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_extension')->nullable();
            $table->string('most_intrested')->nullable();
            $table->string('buy_vehicles_for',5000)->nullable();
            $table->string('wallet')->default('0');
            $table->string('role_id')->default('0');
            $table->string('status')->default('0');
            $table->string('otp')->nullable();
            $table->string('firebase_key')->nullable();
            $table->string('upload_image')->nullable();
            $table->string('uplaod_passport')->nullable();
            $table->string('upload_emirate_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

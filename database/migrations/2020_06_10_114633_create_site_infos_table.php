<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mobile_1')->nullable();
            $table->string('mobile_2')->nullable();
            $table->string('email_1')->nullable();
            $table->string('email_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('address',1000)->nullable();
            $table->string('map_iframe',5000)->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('google_plus_url')->nullable();
            $table->string('about_title')->nullable();
            $table->TEXT('about_info',100000)->nullable();
            $table->TEXT('how_it_works',100000)->nullable();
            $table->TEXT('services',100000)->nullable();
            $table->TEXT('member_fees',100000)->nullable();
            $table->TEXT('terms_and_conditions',100000)->nullable();
            $table->string('logo')->nullable();
            $table->string('withdrawal_limit')->nullable();
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
        Schema::dropIfExists('site_infos');
    }
}

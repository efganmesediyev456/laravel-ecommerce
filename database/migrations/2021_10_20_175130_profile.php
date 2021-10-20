<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Profile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
           
            $table->id();
            $table->bigInteger("user_id")->unsigned();
            $table->string("country")->nullable();
            $table->string("line1")->nullable();
            $table->string("line2")->nullable();
            $table->string("mobile")->nullable();
            $table->string("address")->nullable();
            $table->string("province")->nullable();
            $table->string("image")->nullable();
            $table->foreign("user_id")->references("id")->on('users')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

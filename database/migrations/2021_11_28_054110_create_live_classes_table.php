<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_classes', function (Blueprint $table) {
            $table->id();

            $table->bigInteger("user_id")->comment("connected with admin's database's users table");
            $table->string("topic");
            $table->integer("type")->default(2);
            $table->dateTime("start_time");
            $table->integer("duration")->comment("in minutes");
            $table->string("password");

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
        Schema::dropIfExists('live_classes');
    }
}

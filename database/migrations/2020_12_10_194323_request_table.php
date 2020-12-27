<?php
/**
 * Author: Dan Hallam - B00750229
 * Class: create_request_table
 * Description: migration file for creating the requests table in the database
 */ 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('price');
            $table->string('item');
            $table->string('address');
            $table->string('buyer');
            $table->string('seller');
            $table->string('status');
            $table->unsignedBigInteger('post_id');
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
        Schema::dropIfExists('requests');
    }
}

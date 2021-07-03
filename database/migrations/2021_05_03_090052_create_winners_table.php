<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('winners', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number')->nullable();
            $table->string('bidder_unique_id')->nullable();
            $table->string('name')->nullable();
            $table->string('item_name')->nullable();
            $table->string('item_category')->nullable();
            $table->string('auction_id')->nullable();
            $table->string('bid_amount')->nullable();
            $table->dateTime('bid_start_date')->nullable();
            $table->dateTime('bid_end_date')->nullable();            
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
        Schema::dropIfExists('winners');
    }
}

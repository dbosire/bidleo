<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction', function (Blueprint $table) {
            $table->id();
            $table->string('auction_id')->unique();
            $table->string('item_unique_id')->nullable();                   
            $table->dateTime('bid_end_date')->nullable();          
            $table->string('item_name')->nullable();
            $table->string('item_keyphrase')->nullable();
            $table->string('mcj_keyphrase')->nullable();
            $table->string('ghetto_keyphrase')->nullable();
            $table->string('ten_keyphrase')->nullable();
            $table->string('lowest_unique_bidder')->default('');
            $table->integer('lowest_unique_bid')->default(0);
            $table->string('status')->default('active');
            $table->integer('number_of_bids')->default(0);
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
        Schema::dropIfExists('auction');
    }
}

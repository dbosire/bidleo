<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid', function (Blueprint $table) {
            $table->id();           
            $table->string('auction_id')->nullable();
            $table->string('bidder')->nullable();
            $table->string('item_name')->nullable();
            $table->string('bid_unique_id')->unique();
            $table->string('affiliate')->default('regular');
            $table->integer('bid_amount')->nullable();
            $table->string('bid_status')->default('active');
            $table->dateTime('bid_start_time')->nullable();           
            $table->string('item_unique_id')->nullable();       
            $table->string('item_category')->nullable();                      
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
        Schema::dropIfExists('bid');
    }
}

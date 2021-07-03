<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiddersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidders', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number')->unique();
            $table->string('bidder_unique_id')->unique();
            $table->string('full_name')->nullable();
            $table->string('unique_pin');            
            $table->boolean('eligible')->default(false);        
            // $table->json('mpesa_transaction_codes');
            // $table->json('mpesa_transaction_dates');
            // $table->json('current_bids');
            // $table->json('previous_bids');
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
        Schema::dropIfExists('bidders');
    }
}

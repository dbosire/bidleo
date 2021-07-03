<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->id();            
            $table->string('retail_price')->nullable();
            $table->string('auction_id')->nullable();
            $table->string('item_name')->nullable();
            $table->string('item_category')->nullable();           
            $table->string('item_keyphrase')->nullable();
            $table->string('mcj_keyphrase')->nullable();
            $table->string('ghetto_keyphrase')->nullable();
            $table->string('ten_keyphrase')->nullable();
            $table->dateTime('bid_end_date')->nullable();                      
            $table->string('item_unique_id')->unique();
            $table->string('item_description')->nullable();
            $table->string('condition')->nullable();
            $table->string('year')->nullable();
            $table->string('fuel')->nullable();
            $table->string('color')->nullable();
            $table->string('mileage')->nullable();
            $table->string('engine')->nullable();
            $table->string('transmission')->nullable();
            $table->string('full_name')->nullable();
            $table->string('dual_sim')->nullable();
            $table->string('storage')->nullable();
            $table->string('front_camera')->nullable();
            $table->string('back_camera')->nullable();
            $table->string('voucher_amount')->nullable();
            $table->string('usable_at')->nullable();
            $table->dateTime('expiration_date')->nullable();                      
            $table->string('status')->default('available');
            $table->boolean('auctioned')->default(false);
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
        Schema::dropIfExists('item');
    }
}

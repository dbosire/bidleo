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
            $table->id();
            $table->string('name')->nullable();
            $table->string('bidder_unique_id', 255)->unique();
            $table->string('email')->nullable();
            $table->string('phone_number')->unique();
            $table->string('password', 255);
            $table->boolean('eligible')->default(false);  
            $table->string('status')->default('active');  
            $table->boolean('first_pass_change')->default(false);  
            $table->string('role')->default('admin');
            $table->timestamp('email_verified_at')->nullable();            
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

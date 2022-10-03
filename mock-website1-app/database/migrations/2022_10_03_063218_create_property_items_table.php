<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_items', function (Blueprint $table) {
            $table->id('prop_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('prop_title')->unique;
            $table->string('prop_category');
            $table->string('prop_type');
            $table->string('location');
            $table->timestamp('date_posted');
            $table->timestamp('approved_date')->nullable();
            $table->string('approved_status');
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
        Schema::dropIfExists('property_items');
    }
};

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
        //Adding user firstname, Lastname, Phonennumber
        Schema::table('users', function (Blueprint $table){
            $table->string('fname')->after('name');
            $table->string('lname')->after('fname');
            $table->string('phone_number')->after('email');
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
};

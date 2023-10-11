<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('CIN')->nullable();
            $table->string('salaire')->nullable();
            $table->string('picture')->nullable();
            $table->date('birthdate')->nullable();
            $table->date('date_embauche')->nullable();
            $table->string('grade')->nullable();
            $table->string('genre')->nullable();
            $table->string('Registration_number')->nullable();
            $table->string('role')->nullable()->nullable();
            $table->string('Department')->nullable();
            $table->string('sector')->nullable();
            $table->string('number_phone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('full_address')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('personnels');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemmanddesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demmanddes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->unsignedBigInteger('user_id');
            $table->string('demandeur');
            $table->string('lieu');
            $table->string('justification');
            $table->string('etat_demmande');
            $table->date('date_depart');
            $table->date('date_retour');
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
        Schema::dropIfExists('demmanddes');
    }
}

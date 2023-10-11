<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnRechercheId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::table('personnels', function (Blueprint $table) {
                $table->unsignedBigInteger('recherche_id')->after('id')->nullable();
                $table->foreign('recherche_id')->references('id')->on('recherches');
            }); 
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personnels', function (Blueprint $table) {
            $table->dropForeign(['recherche_id']);
            $table->dropColumn('recherche_id');
        });
    }
}







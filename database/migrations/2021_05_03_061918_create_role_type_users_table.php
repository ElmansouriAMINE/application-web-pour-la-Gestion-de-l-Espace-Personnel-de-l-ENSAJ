<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTypeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_type_users', function (Blueprint $table) {
            $table->id();
            $table->string('role_type')->nullable();
            $table->timestamps();
        });

        DB::table('role_type_users')->insert([
            ['role_type' => 'Admin'],
            ['role_type' => 'Personnel'],
            ['role_type' => 'Directeur'],
            ['role_type' => 'Directeur pédagogique'],
            ['role_type' => 'Ressources humaines'],
            ['role_type' => 'Secretaire général'],
            ['role_type' => 'Chef de département'],
            ['role_type' => 'Directeur de recherche'],
            ['role_type' => 'Chef de filière'],
            ['role_type' => 'Chef de laboratoire'],
            ['role_type' => 'Chef de service'],
            ['role_type' => 'Professeur'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_type_users');
    }
}

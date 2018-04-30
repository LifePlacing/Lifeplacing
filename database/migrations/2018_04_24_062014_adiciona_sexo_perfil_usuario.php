<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaSexoPerfilUsuario extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('sexo', 2)->default('M');           
            $table->binary('foto')->nullable();           
        });
    }


    public function down()
    {
            Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('sexo');           
            $table->dropColumn('foto');           
        });
    }
}

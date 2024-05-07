<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Etiquetas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('etiquetas', function (Blueprint $table) {
            $table->id();
            $table->string("nombreEtiqueta");
            $table->string("descripcion");
            $table->date("fechaCreacion");
            $table->string("usuarioCreador");
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
        //
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //Secrea la tabla en la base de datos.
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("NombreCategoria");
            $table->text("Descripcion");
            $table->date("FechaCreacion");
            $table->string("UsuarioCreador");
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
        Schema::dropIfExists('categories');
    }
}

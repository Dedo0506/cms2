<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts', function (Blueprint $table) {

            //Atributos de la tabla

            $table->id();
            $table->text("PostContenido");         //El contenido es puro texto
            $table->string("PostImagen");          //Ruta en donde se alamcena la img  TODO ver como se guarda la imagen
            $table->date("FechaPublicacion");
            $table->date("FechaCreacion");          //Preguntar si se puede con el timestamp
            $table->boolean("Estatus");
            $table->integer("id_Categoria");
            $table->integer("id_Etiqueta");


            //Constraints
            $table->foreign("id_Categoria")->references("id")->on("categories");
            $table->foreign("id_Etiqueta")->references("id")->on("etiquetas");

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

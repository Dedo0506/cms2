<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;
    protected $table = 'posts';     //Variable con la que se enlaza con la DB
    public timestamp = true;

    public function categorias() {
        return $this->hasOne(CategoriasModel::class);
    }


    public function etiquetas() {
        return $this->hasOne(EtiquetasModel::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtiquetasModel extends Model
{
    use HasFactory;
    protected $table = 'etiquetas';
    public $timestamp = true;


    //Relación de tablas
    public function posts() {
        return $this->hasOne(PostModel::class, 'id');
    }

}

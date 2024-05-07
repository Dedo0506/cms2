<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriasModel extends Model
{
    use HasFactory;
    protected $table = 'categories';
    public $timestamp = true;

    public function posts () {
        return $this->hasMany(PostModel::class);
    }

}

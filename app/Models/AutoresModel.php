<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoresModel extends Model
{
    use HasFactory;

    protected $table = 'autores'; 
    public $timestamp =  true; 
    
    protected $fillable = ['id', 'NombreAutor', 'Email', 'Biografia', 'Foto']; 
    

}

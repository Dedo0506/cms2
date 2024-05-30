<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';
    protected $primaryKey = 'NumCuenta';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'NumCuenta', 'Nombre', 'PrimerApellido', 'SegundoApellido', 'FechaIngreso'
    ];
}

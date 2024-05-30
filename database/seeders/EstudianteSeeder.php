<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('estudiantes')->insert([
            'NumCuenta' =>317234567,
            'Nombre'=>'Daniela',
            'PrimerApellido'=>'Davila',
            'SegundoApellido'=>'Olivares',
            'FechaIngreso'=>'2017-07-21',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('estudiantes')->insert([
            'NumCuenta' =>319087645,
            'Nombre'=>'Eduardo',
            'PrimerApellido'=>'Borja',
            'SegundoApellido'=>'Osnaya',
            'FechaIngreso'=>'2017-08-22',
            'created_at'=> now(),
            'updated_at'=>now()
        ]);

        DB::table('estudiantes')->insert([
            'NumCuenta' =>435676890,
            'Nombre'=>'Paola',
            'PrimerApellido'=>'Sanchez',
            'SegundoApellido'=>'Mendez',
            'FechaIngreso'=>'2020-06-25',
            'created_at'=> now(),
            'updated_at'=>now()
        ]);

        DB::table('estudiantes')->insert([
            'NumCuenta' =>319283567,
            'Nombre'=>'Juan',
            'PrimerApellido'=>'Santelis',
            'SegundoApellido'=>'Perez',
            'FechaIngreso'=>'2019-06-15',
            'created_at'=> now(),
            'updated_at'=>now()
        ]);
    }
}

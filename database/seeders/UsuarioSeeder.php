<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            'name' => 'daniela',
            'email' => 'daniela@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        DB::table('usuarios')->insert([
            'name' => 'daniela davila',
            'email' => 'danieladavi@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        DB::table('usuarios')->insert([
            'name' => 'juan perez',
            'email' => 'juan_perez@gmail.com',
            'password' => bcrypt('123hola'),
        ]);

        DB::table('usuarios')->insert([
            'name' => 'raul juarez',
            'email' => 'raul.j@gmail.com',
            'password' => bcrypt('hola123'),
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'daniela',
            'email' => 'daniela@gmail.com',
            'password' => bcrypt('12345')
        ])->assignRole('Admin');

        User::create([
            'name' => 'daniela davila',
            'email' => 'danieladavi@gmail.com',
            'password' => bcrypt('12345')
        ])->assignRole('Autor');

        User::create([
            'name' => 'juan perez',
            'email' => 'juan_perez@gmail.com',
            'password' => bcrypt('123hola')
        ])->assignRole('Admin');

        User::create([
            'name' => 'raul juarez',
            'email' => 'raul.j@gmail.com',
            'password' => bcrypt('hola123')
        ])->assignRole('Autor');
    }
}

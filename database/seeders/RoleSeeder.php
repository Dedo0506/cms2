<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Autor']);

        //categorias
        Permission::create(['name' => 'categorias.index'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'categorias.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'categorias.edit'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'categorias.destroy'])->syncRoles($role1, $role2);
    
        //etiquetas
        Permission::create(['name' => 'etiquetas.index'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'etiquetas.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'etiquetas.edit'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'etiquetas.destroy'])->syncRoles($role1, $role2);

        //posts
        Permission::create(['name' => 'posts.index'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'posts.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'posts.edit'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'posts.destroy'])->syncRoles($role1, $role2);

        //autores
        Permission::create(['name' => 'autores.index'])->assignRole($role1);
        Permission::create(['name' => 'autores.create'])->assignRole($role1);
        Permission::create(['name' => 'autores.edit'])->assignRole($role1);
        Permission::create(['name' => 'autores.destroy'])->assignRole($role1);

        //roles
        Permission::create(['name' => 'roles.index'])->assignRole($role1);
        Permission::create(['name' => 'roles.create'])->assignRole($role1);
        Permission::create(['name' => 'roles.edit'])->assignRole($role1);
        Permission::create(['name' => 'roles.destroy'])->assignRole($role1);

        //usuarios
        Permission::create(['name' => 'usuarios.index'])->assignRole($role1);
        Permission::create(['name' => 'usuarios.create'])->assignRole($role1);
        Permission::create(['name' => 'usuarios.edit'])->assignRole($role1);
        Permission::create(['name' => 'usuarios.destroy'])->assignRole($role1);

    }
}

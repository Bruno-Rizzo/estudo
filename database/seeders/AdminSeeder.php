<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
   
    public function run()
    {
        User::create([
            'name'              => 'Bruno Rizzo',
            'email'             => 'bruno@email.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('password'),
            'role_id'           => Role::create(['name' => 'Administrador'])->id
        ]);

        User::create([
            'name'              => 'Ananda Cristina',
            'email'             => 'ananda@email.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('password'),
            'role_id'           => Role::create(['name' => 'Gerente'])->id
        ]);

        User::create([
            'name'              => 'Luíza Cristina',
            'email'             => 'luiza@email.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('password'),
            'role_id'           => Role::create(['name' => 'Analista'])->id
        ]);

        Permission::create(['name' => 'post-criar']);
        Permission::create(['name' => 'post-visualizar']);
        Permission::create(['name' => 'post-editar']);
        Permission::create(['name' => 'post-excluir']);

        DB::table('permission_role')->insert([
            ['permission_id' => '1' , 'role_id' => '1'],
            ['permission_id' => '2' , 'role_id' => '1'],
            ['permission_id' => '3' , 'role_id' => '1'],
            ['permission_id' => '4' , 'role_id' => '1'],
        ]);

    }
}

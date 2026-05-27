<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'editor', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'viewer', 'created_at' => now(), 'updated_at' => now()],
        ]);
        
        $adminId = DB::table('users')->insertGetId([
            'name' => 'Usuario Administrador',
            'email' => 'admin@prueba.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $editorId = DB::table('users')->insertGetId([
            'name' => 'Usuario Editor',
            'email' => 'editor@prueba.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $viewerId = DB::table('users')->insertGetId([
            'name' => 'Usuario Lector',
            'email' => 'viewer@prueba.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_roles')->insert([
            ['user_id' => $adminId, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => $editorId, 'role_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => $viewerId, 'role_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('categories')->insertOrIgnore([
            'id' => 1,
            'name' => 'General',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory(5)->create();
        Post::factory(30)->create();
    }
}
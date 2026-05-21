<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
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
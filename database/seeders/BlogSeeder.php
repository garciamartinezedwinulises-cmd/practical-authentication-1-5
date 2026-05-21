<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Tag;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Tecnología',
            'description' => 'Publicaciones sobre avances tecnológicos.'
        ]);

        Category::create([
            'name' => 'Programación',
            'description' => 'Tutoriales y guías de desarrollo de software.'
        ]);

        Tag::create(['name' => 'Laravel']);
        Tag::create(['name' => 'PHP']);
    }
}
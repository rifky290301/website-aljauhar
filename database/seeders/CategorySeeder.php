<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Berita',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Category::create([
            'name' => 'Artikel',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Category::create([
            'name' => 'Cerpen',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Category::create([
            'name' => 'Puisi',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Category::create([
            'name' => 'Opini',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Category::create([
            'name' => 'Karya ilmiah',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

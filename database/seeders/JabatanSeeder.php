<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    public function run()
    {
        Jabatan::create([
            'name' => 'Santri',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Jabatan::create([
            'name' => 'Ketua',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Santri;
use App\Models\User;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Events\Registered;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Role::create([
            'name' => 'pengurus',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Role::create([
            'name' => 'santri',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Santri::create([
            'name' => 'Admin',
            'phone' => '088888888888',
            'room' => '0',
            'status' => 'aktif',
            'institute' => 'Filsafat, Universitas Jember',
            'address' => 'Jl. Admin',
            'birthplace' => 'Jember',
            'born' => now(),
            'year_of_entry' => now(),
            'photo' => 'default.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $superAdmin = User::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'remember_token' => \Str::random(60),
            'santri_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $superAdmin->assignRole('admin');
        event(new Registered($superAdmin));

        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(JabatanSeeder::class);
    }
}

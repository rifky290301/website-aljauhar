<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonial::create([
            'name' => 'John Doe',
            'job' => 'Web Developer',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
            'photo' => 'default.png',
            'publish' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

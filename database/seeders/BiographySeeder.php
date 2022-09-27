<?php

namespace Database\Seeders;

use App\Models\Biography;
use Illuminate\Database\Seeder;

class BiographySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Biography::create([
            'photo' => 'default.png',
            'name' => 'John Doe',
            'biography'=> '<p><strong>Banyuwangi</strong>, previously known as&nbsp;<strong>Banjoewangi</strong>, is the administrative capital of&nbsp;<a title="Banyuwangi Regency" href="https://en.wikipedia.org/wiki/Banyuwangi_Regency">Banyuwangi Regency</a>&nbsp;at the far eastern end of the island of&nbsp;<a title="Java" href="https://en.wikipedia.org/wiki/Java">Java</a>,&nbsp;<a title="Indonesia" href="https://en.wikipedia.org/wiki/Indonesia">Indonesia</a>. It had a population of 106,000 at the 2010 Census<sup id="cite_ref-1" class="reference"><a href="https://en.wikipedia.org/wiki/Banyuwangi_(town)#cite_note-1">[1]</a></sup>&nbsp;and 117,558 at the 2020 Census.<sup id="cite_ref-2" class="reference"><a href="https://en.wikipedia.org/wiki/Banyuwangi_(town)#cite_note-2">[2]</a></sup></p>',
            'position' => 'Pengasuh 0',
            'publish' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Biography::create([
            'photo' => 'default_2.png',
            'name' => 'John Doe',
            'biography'=> '<p><strong>Banyuwangi</strong>, previously known as&nbsp;<strong>Banjoewangi</strong>, is the administrative capital of&nbsp;<a title="Banyuwangi Regency" href="https://en.wikipedia.org/wiki/Banyuwangi_Regency">Banyuwangi Regency</a>&nbsp;at the far eastern end of the island of&nbsp;<a title="Java" href="https://en.wikipedia.org/wiki/Java">Java</a>,&nbsp;<a title="Indonesia" href="https://en.wikipedia.org/wiki/Indonesia">Indonesia</a>. It had a population of 106,000 at the 2010 Census<sup id="cite_ref-1" class="reference"><a href="https://en.wikipedia.org/wiki/Banyuwangi_(town)#cite_note-1">[1]</a></sup>&nbsp;and 117,558 at the 2020 Census.<sup id="cite_ref-2" class="reference"><a href="https://en.wikipedia.org/wiki/Banyuwangi_(town)#cite_note-2">[2]</a></sup></p>',
            'position' => 'Pengasuh 0',
            'publish' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Biography::create([
            'photo' => 'default_3.png',
            'name' => 'John Doe',
            'biography'=> '<p><strong>Banyuwangi</strong>, previously known as&nbsp;<strong>Banjoewangi</strong>, is the administrative capital of&nbsp;<a title="Banyuwangi Regency" href="https://en.wikipedia.org/wiki/Banyuwangi_Regency">Banyuwangi Regency</a>&nbsp;at the far eastern end of the island of&nbsp;<a title="Java" href="https://en.wikipedia.org/wiki/Java">Java</a>,&nbsp;<a title="Indonesia" href="https://en.wikipedia.org/wiki/Indonesia">Indonesia</a>. It had a population of 106,000 at the 2010 Census<sup id="cite_ref-1" class="reference"><a href="https://en.wikipedia.org/wiki/Banyuwangi_(town)#cite_note-1">[1]</a></sup>&nbsp;and 117,558 at the 2020 Census.<sup id="cite_ref-2" class="reference"><a href="https://en.wikipedia.org/wiki/Banyuwangi_(town)#cite_note-2">[2]</a></sup></p>',
            'position' => 'Pengasuh 0',
            'publish' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

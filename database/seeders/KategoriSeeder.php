<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create('en_US');

        // for($i = 1; $i <= 50; $i++){
        //     DB::table('kategoris')->insert([
        //         'name' => $faker->name
        //     ]);
        // }

        Kategori::create([
            'name' => 'Makanan'
        ]);

        Kategori::create([
            'name' => 'Minuman'
        ]);

        Kategori::create([
            'name' => 'Cemilan'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'menu_name' => 'Nasi Goreng',
            'price' => '15000',
            'description' => 'que pasa famos',
            'image' => null,
            'kategori_id' => '1'
        ]);

        Menu::create([
            'menu_name' => 'Es Teh Manis',
            'price' => '3000',
            'description' => 'que pasa famos',
            'image' => null,
            'kategori_id' => '2'
        ]);

        Menu::create([
            'menu_name' => 'Mie Goreng',
            'price' => '10000',
            'description' => 'que pasa famos',
            'image' => null,
            'kategori_id' => '1'
        ]);

        Menu::create([
            'menu_name' => 'Mie Bakso',
            'price' => '15000',
            'description' => 'que pasa famos',
            'image' => null,
            'kategori_id' => '1'
        ]);

        Menu::create([
            'menu_name' => 'Es Jeruk',
            'price' => '5000',
            'description' => 'que pasa famos',
            'image' => null,
            'kategori_id' => '2'
        ]);

        Menu::create([
            'menu_name' => 'Es Krim',
            'price' => '7000',
            'description' => 'que pasa famos',
            'image' => null,
            'kategori_id' => '3'
        ]);
    }
}

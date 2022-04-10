<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Integer;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 10; $x++) {
            DB::table('products')->insert([
                'name' => Str::random(rand(4,10)),
                'manufacturer' => Str::random(rand(5,8)).'.Kft',
                'price' => rand(50,150),
                'quantity' => rand(1,100),
                'category' => 'cat('.rand(1,4).')',
                'other' => Str::random(8),
            ]);
        }
    }
}

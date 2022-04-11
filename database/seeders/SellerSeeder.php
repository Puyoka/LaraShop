<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Integer;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 2; $x++) {
            DB::table('sellers')->insert([
                'name' => Str::random(rand(4,10)),
                'password' => Hash::make(Str::random(rand(4,10))),
            ]);
        }
    }
}

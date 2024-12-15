<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenjang = [
            [
                'id' => 1,
                'nama' => "CABERAWIT",
            ],
            [
                'id' => 2,
                'nama' => "PAUD/TK",
            ],
            [
                'id' => 3,
                'nama' => "REMAJA",
            ],
            [
                'id' => 4,
                'nama' => "PRA REMAJA",
            ],
            [
                'id' => 5,
                'nama' => "PRA NIKAH",
            ],
            [
                'id' => 6,
                'nama' => "GM",
            ],
            [
                'id' => 7,
                'nama' => "GU",
            ],
            [
                'id' => 8,
                'nama' => "GU BARU",
            ],
            [
                'id' => 9,
                'nama' => "USMAN",
            ],
        ];
        
        DB::table('jenjang')->insert($jenjang);
    }
}

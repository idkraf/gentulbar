<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $desa = [
            [
                'id' => 1,
                'nama' => "DESA BANGUNJAYA",
            ],
            [
                'id' => 2,
                'nama' => "DESA NGEBONG",
            ],
            [
                'id' => 3,
                'nama' => "DESA SANGGRAHAN",
            ],
            [
                'id' => 4,
                'nama' => "DESA SERDA",
            ],
            [
                'id' => 5,
                'nama' => "DESA SERTA",
            ],
            [
                'id' => 6,
                'nama' => "DESA SERTU",
            ],
            [
                'id' => 7,
                'nama' => "DESA SANAN",
            ],
            [
                'id' => 8,
                'nama' => "DESA CAMPURDARAT",
            ],
            [
                'id' => 9,
                'nama' => "DESA BALESONO",
            ],
            [
                'id' => 10,
                'nama' => "DESA CAMPUR KUNTUL",
            ],
            [
                'id' => 11,
                'nama' => "DESA BANGUNMULYO",
            ],
            [
                'id' => 12,
                'nama' => "DESA WATES KROYO",
            ],
            [
                'id' => 13,
                'nama' => "DESA NGLAMPIR",
            ],
            [
                'id' => 14,
                'nama' => "DESA BESOLE",
            ],
            [
                'id' => 15,
                'nama' => "DESA KEBOIRENG",
            ],
            [
                'id' => 16,
                'nama' => "DESA TANGGGUL WELAHAN",
            ],
            [
                'id' => 17,
                'nama' => "DESA NGENTRONG",
            ],
            [
                'id' => 18,
                'nama' => "DESA SAWO",
            ],
            [
                'id' => 19,
                'nama' => "DESA TAMBAN",
            ],
            [
                'id' => 20,
                'nama' => "DESA JANGGRANG",
            ],
            [
                'id' => 21,
                'nama' => "DESA BESUKI",
            ],
            [
                'id' => 22,
                'nama' => "DESA SODO",
            ],
            [
                'id' => 23,
                'nama' => "DESA MALASAN",
            ],
            [
                'id' => 24,
                'nama' => "DESA SERUT",
            ],
            [
                'id' => 25,
                'nama' => "DESA GEBANG",
            ],
            [
                'id' => 26,
                'nama' => "DESA PECUK",
            ],
        ];
        DB::table('desa')->insert($desa);
    }
}

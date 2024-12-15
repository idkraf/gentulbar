<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelompokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $kelompok = [
            [
                'desa' => 1, //DESA BANGUNJAYA
                'nama' => "BANGUNJAYA 1",
            ],
            [
                'desa' => 1, //DESA BANGUNJAYA
                'nama' => "BANGUNJAYA 2",
            ],
            [
                'desa' => 1, //DESA BANGUNJAYA
                'nama' => "BANGUNJAYA 3",
            ],
            [
                'desa' => 1, //DESA BANGUNJAYA
                'nama' => "BANGUNJAYA 4",
            ],
            [
                'desa' => 1, //DESA BANGUNJAYA
                'nama' => "BANGUNJAYA 5",
            ],
            [
                'desa' => 1, //DESA BANGUNJAYA
                'nama' => "BANGUNJAYA 6",
            ],
            [
                'desa' => 1, //DESA BANGUNJAYA
                'nama' => "BANGUNJAYA 7",
            ],
            [
                'desa' => 1, //DESA BANGUNJAYA
                'nama' => "GEBANG",
            ],
            [
                'desa' => 1, //DESA BANGUNJAYA
                'nama' => "NGRANCE",
            ],
            [
                'desa' => 2, //DESA NGEBONG
                'nama' => "NGEBONG",
            ],
            [
                'desa' => 2, //DESA NGEBONG
                'nama' => "CAMPURDARAT",
            ],
            [
                'desa' => 2, //DESA NGEBONG
                'nama' => "MINDI",
            ],
            [
                'desa' => 2, //DESA NGEBONG
                'nama' => "NGLAMPIR",
            ],
            [
                'desa' => 2, //DESA NGEBONG
                'nama' => "BESOLE",
            ],
            [
                'desa' => 2, //DESA NGEBONG
                'nama' => "BANGUNMULYO",
            ],
            [
                'desa' => 2, //DESA NGEBONG
                'nama' => "MINDI",
            ],
            [
                'desa' => 3, //DESA SANGGRAHAN
                'nama' => "SANGTIM",
            ],
            [
                'desa' => 3, //DESA SANGGRAHAN
                'nama' => "SANGBAR",
            ],
            [
                'desa' => 3, //DESA SANGGRAHAN
                'nama' => "PUCUNG 1",
            ],
            [
                'desa' => 3, //DESA SANGGRAHAN
                'nama' => "PUCUNG 2",
            ],
            [
                'desa' => 3, //DESA SANGGRAHAN
                'nama' => "BOYOLANGU",
            ],
            [
                'desa' => 3, //DESA SANGGRAHAN
                'nama' => "TANGGUNG",
            ],
            [
                'desa' => 4, //DESA SERDA
                'nama' => "SERDA 1",
            ],
            [
                'desa' => 4, //DESA SERDA
                'nama' => "SERDA 2",
            ],
            [
                'desa' => 4, //DESA SERDA
                'nama' => "SERDA 3",
            ],
            [
                'desa' => 4, //DESA SERDA
                'nama' => "SERDA 4",
            ],
            [
                'desa' => 4, //DESA SERDA
                'nama' => "",
            ],
            [
                'desa' => 4, //DESA SERDA
                'nama' => "KALITURI",
            ],
            [
                'desa' => 4, //DESA SERDA
                'nama' => "TRETEK",
            ],
            [
                'desa' => 5,//DESA SERTA
                'nama' => "TANJUNGSARI 1",
            ],
            [
                'desa' => 5,//DESA SERTA
                'nama' => "TANJUNGSARI 2",
            ],
            [
                'desa' => 5,//DESA SERTA
                'nama' => "TANJUNGSARI 3",
            ],
            [
                'desa' => 5,//DESA SERTA
                'nama' => "TANJUNGSARI 4",
            ],
            [
                'desa' => 5,//DESA SERTA
                'nama' => "TANJUNGSARI 5",
            ],
            [
                'desa' => 5,//DESA SERTA
                'nama' => "TANJUNGSARI 6",
            ],
            [
                'desa' => 6, //DESA SERTU
                'nama' => "BARAT",
            ],
            [
                'desa' => 6, //DESA SERTU
                'nama' => "TENGAH",
            ],
            [
                'desa' => 6, //DESA SERTU
                'nama' => "TIMUR",
            ],
            [
                'desa' => 6, //DESA SERTU
                'nama' => "JEPUN",
            ],
            [
                'desa' => 6, //DESA SERTU
                'nama' => "SUMBERGEMPOL",
            ],
            [
                'desa' => 6, //DESA SERTU
                'nama' => "TAPAN",
            ],
        ];
        DB::table('kelompok')->insert($kelompok);
    }
}

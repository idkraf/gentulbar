<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generus extends Model
{
    use HasFactory;
    protected $table = "generus";
    protected $primaryKey = 'id_generus';
    
    protected $fillable = [
        'nama',
        'cawabup_id',
        'gender',
        'jenjang',
        'kelaskbm',
        'nig',
        'tempat_lahir',
        'tanggal_lahir',
        'ayah',
        'ibu',
        'nohp',
        'alamat',
        'kelompok',
        'desa',
        'sekolah',
        'mondok',
        'tugas',
        'kerja',
    ];
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa');
    }
    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class, 'jenjang');
    }
    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'kelompok');
    }
}

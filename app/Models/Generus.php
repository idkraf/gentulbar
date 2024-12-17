<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generus extends Model
{
    use HasFactory;
    protected $table = "generus";
    protected $primaryKey = 'id';
    
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
    public function desas()
    {
        return $this->belongsTo(Desa::class, 'desa', 'id');
    }
    public function jenjangs()
    {
        return $this->belongsTo(Jenjang::class, 'jenjang', 'id');
    }
    public function kelompoks()
    {
        return $this->belongsTo(Kelompok::class, 'kelompok', 'id');
    }
}

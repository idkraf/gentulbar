<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generus extends Model
{
    use HasFactory;
    protected $table = "generus";
    protected $primaryKey = 'id_generus';
}

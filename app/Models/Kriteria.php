<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = "kriterias";
    protected $primaryKey = "kriteria_id";

    protected $fillable = [
        'kriteria_id',
        'nama_kriteria',
        'bobot',
        'attribut',
    ];
}

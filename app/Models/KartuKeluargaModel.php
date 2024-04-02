<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluargaModel extends Model
{
    use HasFactory;

    protected $table = "kartu_keluarga";
    protected $primaryKey = "kartu_keluarga_id";
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RwModel extends Model
{
    use HasFactory;

    protected $table = "rw";
    protected $primaryKey = "rw_id";
}

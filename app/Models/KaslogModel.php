<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaslogModel extends Model
{
    use HasFactory;

    protected $table = "kas_log";
    protected $primaryKey = "kas_log_id";

    protected $fillable = ['user_id', 'jumlah', 'keterangan_kas_log'];
}

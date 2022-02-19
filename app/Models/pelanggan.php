<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    use HasFactory;
    protected $table = 'master_nama_pelanggan';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'namapelanggan', 'Telp', 'email'];
}

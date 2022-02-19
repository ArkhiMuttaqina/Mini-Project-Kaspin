<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
    protected $table = 'master_supplier';
    protected $primaryKey = 'ids';
    protected $fillable = ['ids', 'nama_supplier', 'alamat_supplier', 'no_supplier', 'email_supplier'];

}

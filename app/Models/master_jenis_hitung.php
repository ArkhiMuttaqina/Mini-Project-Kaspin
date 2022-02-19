<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_jenis_hitung extends Model
{
    use HasFactory;
    protected $table = 'master_jenis_hitung';
    protected $primaryKey   = 'id_jenis_hitung';
    protected $fillable = [
    'id_jenis_hitung',
     'jenishitung'];
    }

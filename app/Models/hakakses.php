<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hakakses extends Model
{
    use HasFactory;

    protected $table = 'hakakses';
    protected $primaryKey = 'id';
    protected $fillable = ['id_hakakses', 'namahakakses', 'id_hak'];

}


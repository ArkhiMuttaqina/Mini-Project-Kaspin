<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masteruser extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'username',
        'foto_profil',
        'paraf',
        'nama',
        'inisial',
        'password',
        'nohp',
        'id_hakakses',
        'id_status',
        'otp',
        'remember_token',
        'created_at',
        'updated_at'
    ];
}

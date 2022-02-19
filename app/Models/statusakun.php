<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statusakun extends Model
{
    use HasFactory;
    protected $table = 'statusakun';
    protected $primaryKey = 'id_status';
    protected $fillable = ['id_status', 'statusakun'];

}

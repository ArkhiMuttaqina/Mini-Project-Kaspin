<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_status_approval extends Model
{
    use HasFactory;
    protected $table = 'master_status_approval';
    protected $primaryKey = 'id_statusapproval';
    protected $fillable = [
    'id_statusapproval',
     'statusapproval'];
}

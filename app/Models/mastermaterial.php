<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mastermaterial extends Model
{
    use HasFactory;
    protected $table = 'master_material';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'namamaterial', 'kodematerial', 'hargamaterial', 'batch_date', 'updated_at', 'created_at', 'selisih', 'hargabeli_material', 'supllier', 'stok', 'belikalistok', 'jualkalistok'];
}

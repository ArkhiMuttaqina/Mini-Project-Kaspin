<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_coa extends Model
{
    use HasFactory;
    protected $table = 'laporan_labarugi';
    protected $primaryKey   = 'id';
    protected $fillable = ['id', 'tanggal', 'bulan', 'tahun', 'date_complete', 'updated_at', 'created_at', 'catatan', 'start_date', 'end_date', 'pendapatan', 'biaya_hpp', 'biaya_lain', 'laba_kotor', 'laba_bersih'];

}

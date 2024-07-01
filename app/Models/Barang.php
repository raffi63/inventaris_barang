<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = [
        'id',
        'namabarang',
        'deskripsi',
        'serialnumber',
        'tahun',
        'jumlahbarang',
        'satuan',
        'kondisi',
        'keterangan',
        'jenisbarang',
        'ruang',
        'status'
    ];
    protected $keyType = 'string';
    protected $primaryKey = 'id';
}

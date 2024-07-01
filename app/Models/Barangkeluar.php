<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    use HasFactory;

    protected $table = 'barangkeluar';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'idbarang',
        'idpegawai',
        'statuskeluar',
        'jumlahkeluar',
        'tanggal',
    ];

    protected $dates = ['tanggal'];

    // Define the relationship with the Barang model
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'idbarang', 'id');
    }

    // Define the relationship with the Pegawai model
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'idpegawai', 'id');
    }
}

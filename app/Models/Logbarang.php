<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbarang extends Model
{
    use HasFactory;

    protected $table = 'logbarang';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $date = ['logtanggal'];

    protected $fillable = [
        'id',
        'idbarang',
        'statuslama',
        'statusbaru',
        'logtanggal'
    ];

    // Define the relationship with the Barang model
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'idbarang', 'id');
    }
}

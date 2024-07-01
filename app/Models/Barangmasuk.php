<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangmasuk extends Model
{
    use HasFactory;

    protected $table = 'barangmasuk';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'idkeluar',
        'jumlahmasuk',
        'statusmasuk',
        'tanggal',
    ];

    protected $dates = ['tanggal'];

    // Define the relationship with the Barangkeluar model
    public function barangkeluar()
    {
        return $this->belongsTo(Barangkeluar::class, 'idkeluar', 'id');
    }
}

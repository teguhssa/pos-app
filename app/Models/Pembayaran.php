<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $with = ['barang', 'unit'];

    protected $fillable = ['barang_id', 'no_trx', 'qty', 'harga', 'unit_id', 'status'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function unit()
    {
        return $this->belongsTo(Units::class);
    }
}

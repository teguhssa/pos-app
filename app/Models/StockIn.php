<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    use HasFactory;
    protected $with = ['barang', 'suplayer'];

    protected $fillable = ['barang_id', 'suplayer_id', 'no_trx', 'qty', 'harga', 'total', 'petugas'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function suplayer()
    {
        return $this->belongsTo(Suplayer::class);
    }
}

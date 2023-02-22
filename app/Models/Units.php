<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class Units extends Model
{
    use HasFactory;


    protected $fillable = ['nama_unit'];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}

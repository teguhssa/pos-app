<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Suplayer extends Model
{
    use HasFactory;


    protected $fillable = ['nama_suplayer', 'email', 'no_telp'];

    public function stockin()
    {
        return $this->hasOne(StockIn::class);
    }
}

<?php

namespace App\Models;

use App\Models\Units;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'nama_barang', 'qty', 'harga', 'unit_id', 'status'];

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function unit() 
    {
        return $this->belongsTo(Units::class);
    }

    public function stockin()
    {
        return $this->hasOne(StockIn::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}

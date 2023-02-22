<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use App\Models\StockIn;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() 
    {
        $total_penjualan = DB::table('transaksis')->sum('total');
        $stockIns = StockIn::all();
        $transaksis = Transaksi::all();
        $users = User::all();
        $barangs = Barang::all();
        $barang_aktif = Barang::where('status', 'aktif');
        return view('dashboard.index', compact('stockIns', 'total_penjualan', 'transaksis', 'users', 'barangs', 'barang_aktif'));
    }
}

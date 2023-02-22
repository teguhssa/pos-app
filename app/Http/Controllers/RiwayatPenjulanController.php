<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatPenjulanController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('dashboard.riwayat_penjualan.index', [
            'transaksis' => $transaksis
        ]);
    }

    public function detailTransaksi(Request $request)
    {
        $invoice = Transaksi::where('invoice', $request->id)->first();
        $data = DB::table('pembayarans')
            ->join('barangs', 'pembayarans.barang_id', '=', 'barangs.id')
            ->join('units', 'pembayarans.unit_id', '=', 'units.id')
            ->select('pembayarans.no_trx', 'barangs.nama_barang' ,'pembayarans.qty', 'pembayarans.harga', 'units.nama_unit')
            ->where('no_trx', $request->id)
            ->get();
        return view('dashboard.riwayat_penjualan.detail_transaksi', [
            'transaksi' => $invoice,
            'datas' => $data
        ]);
    }
}

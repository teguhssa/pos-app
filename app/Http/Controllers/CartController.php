<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Units;
use App\Models\Barang;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        return view('dashboard.pembayaran.index', [
            'barangs' => Barang::where('status', 'aktif')->get(),
            'units' => Units::all()
        ]);
    }

    public function kode_prefix($uniq='MYPOS')
    {
        $getdb =  DB::table('transaksis')->where('invoice', DB::raw("(select max(`invoice`) from transaksis)"))->first();
        $date = date('ymd');
        $kd = $uniq.$date;
        $max = @$getdb->invoice;
        if($max){
            $max++;
            $kodeauto = sprintf("%03s", $max);
            return $kodeauto;
        }else{
            return $kd.sprintf("%03s",$max);
        }
    }

    public function insertCart(Request $request)
    {

        $no_trx = $this->kode_prefix('MYPOS');

        $data = [
            'barang_id' => $request->barang_id,
            'no_trx' => $no_trx,
            'qty' => $request->qty,
            'harga' => $request->harga,
            'total' => $request->total,
            'unit_id' => $request->unit_id,
            'status' => '0'
        ];

        $valId = $request->barang_id;
    
        $currentVal = DB::table('barangs')
        ->where('id', $valId)
        ->value('qty');
        
        $newVal = $currentVal - $request->qty;

        if($request->qty > $currentVal){
            return response()->json(['error', 'Nilai stock tidak mencukupi']);
        }
        
        if($newVal < 0){
            $newVal = 0;
        }
        
        DB::table('barangs')
        ->where('id', $valId)
        ->update(['qty' => $newVal]);

        Pembayaran::create($data);

        return response()->json(['success' => 'berhasil']);
    }

    public function showCart()
    {
        // $data = DB::table('pembelians')->join('barangs', 'barangs.id', '=', 'pembelian.barang_id', 'left')->where('status', 0);
        return view('dashboard.pembayaran.data_keranjang', [
            'dataCart' => Pembayaran::with(['barang', 'unit'])->where('status', '0')->get()
        ]);
    }

    public function checkOut(Request $request)
    {

        if(!$request->total){
            return response()->json(['error', 'Pilih barang terlebih dahulu']);
        }

        $invoice = $this->kode_prefix('MYPOS');
        $petugas = auth()->user()->username;
        $data = [
            'invoice' => $invoice,
            'total' => $request->total,
            'total_bayar' => $request->total_bayar,
            'kembalian' => $request->kembalian,
            'petugas' => $petugas
        ];

        Transaksi::create($data);

        Pembayaran::where('no_trx', $invoice)->update(['status' => '1']);

        return response()->json(['success' => 'Pembelian berhasil']);
    }
}

<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Barang;
use App\Models\StockIn;
use App\Models\Suplayer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StockInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.stockin.index', [
            'stockIns' => StockIn::with(['barang', 'suplayer'])->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.stockin.create', [
            'barangs' => Barang::all(),
            'suplayers' => Suplayer::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'barang_id' => 'required',
            'suplayer_id' => 'required',
            'qty' => 'required',
            'harga' => 'required',
            'total' => 'required',
        ]);

        $dt = Carbon::now();
        $dt_format = $dt->format('YmdHis');

        $validatedData['no_trx'] = "POS#".$dt_format;
        $validatedData['petugas'] = auth()->user()->username;

        StockIn::create($validatedData);

        $currentId = $request->barang_id;

        // handle qty
        $currentVal = DB::table('barangs')
            ->where('id', $currentId)
            ->value('qty');

        $newVal = $currentVal + $request->qty;
        // handle qty

        // handle harga
        $harga = DB::table('barangs')
        ->where('id', $currentId)
        ->value('harga');

        $newHarga = 0;
        if($harga === 0){
           $newHarga = $request->harga;
        } else {
            $newHarga = $harga;
        }
       

        Barang::where('id', $request->barang_id)->first()->update([
            'qty' => $newVal,
            'harga' => $newHarga
        ]);

        
        return redirect()->route('stock-in.index')->with('success', 'Stock berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stockin  $stockin
     * @return \Illuminate\Http\Response
     */
    public function show(Stockin $stockin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stockin  $stockin
     * @return \Illuminate\Http\Response
     */
    public function edit(Stockin $stockin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stockin  $stockin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stockin $stockin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stockin  $stockin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stockin $stockin)
    {
        try {
            $s = StockIn::findOrFail($stockin->id);
            $s->delete();
            return redirect()->route('stockin.index')->with('success', 'Transaksi berhasil dihapus');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    }

    // public function generateReportStockin()
    // {
    //     $stockIns = StockIn::with(['barang', 'suplayer'])->latest()->get();
    //     $pdf = PDF::loadView('dashboard.pdf.report_stockin', ['stockIns' => $stockIns]);

    //     return $pdf->download('report-stockin.pdf');
    // }
}

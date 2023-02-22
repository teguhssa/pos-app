<?php

namespace App\Http\Controllers;

use App\Models\Suplayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SuplayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.suplayer.index', [
            'dataSuplayers' => Suplayer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.suplayer.create');
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
            'nama_suplayer' => 'required|max:20',
            'email' => 'required|email:dns|unique:suplayers',
            'no_telp' => 'required|max:18'
        ]);

        Suplayer::create($validatedData);

        return redirect()->route('suplayers.index')->with('success', 'Suplayer berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suplayer  $suplayer
     * @return \Illuminate\Http\Response
     */
    public function show(Suplayer $suplayer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suplayer  $suplayer
     * @return \Illuminate\Http\Response
     */
    public function edit(Suplayer $suplayer)
    {
        return view('dashboard.suplayer.edit', [
            'suplayer' => $suplayer,
            'user' => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suplayer  $suplayer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suplayer $suplayer)
    {
        $validatedData = $request->validate([
            'nama_suplayer' => 'required|max:20',
            'email' => 'required|email:dns',
            'no_telp' => 'required|max:18'
        ]);

        Suplayer::where('id', $suplayer->id)
            ->update($validatedData);

        return redirect()->route('suplayers.index')->with('success', 'Suplayer berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suplayer  $suplayer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suplayer $suplayer)
    {
        try {
            $sup = Suplayer::findOrFail($suplayer->id);
            $sup->delete();
            return redirect()->route('suplayers.index')->with('success', 'Suplayer berhasil dihapus');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    }
}

@extends('layout.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <h4>Pembelian Barang</h4>
        </div>
    </div>

    <a href="/stock-in/create" class="btn btn-primary my-3">Pembelian</a>

    @if (session()->has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    {{-- table --}}
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No. Trasansaksi</th>
                                    <th>Nama Barang</th>
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Nama Suplayer</th>
                                    <th>Petugas</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if ($stockIns->count() >= 1)
                                <tbody>
                                    @foreach ($stockIns as $stockin)
                                        <tr>
                                            <td>{{ $stockin->no_trx }}</td>
                                            <td>{{ $stockin->barang->nama_barang }}</td>
                                            <td>{{ $stockin->qty }}</td>
                                            <td>{{ $stockin->harga }}</td>
                                            <td>{{ $stockin->total }}</td>
                                            <td>{{ $stockin->suplayer->nama_suplayer }}</td>
                                            <td>{{ $stockin->petugas }}</td>
                                            <td>{{ $stockin->created_at }}</td>
                                            <td>
                                                <form action="{{ route('stock-in.destroy', $stockin->id) }}"
                                                    class="d-inline" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit"
                                                        onclick="return confirm('Anda yakin?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak ada Data</td>
                                    </tr>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <h4>Kelola Barang</h4>
        </div>
    </div>

    <a href="/barangs/create" class="btn btn-primary my-3">Tambah barang</a>

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
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Quantity</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Harga/unit</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if ($barangs->count() >= 1)
                                <tbody>
                                    @foreach ($barangs as $barang)
                                        <tr>
                                            <td>{{ $barang->nama_barang }}</td>
                                            <td>{{ $barang->category->nama_kategori }}</td>
                                            <td>{{ $barang->qty }}</td>
                                            <td>{{ $barang->unit->nama_unit }}</td>
                                            <td>{{ $barang->harga }}</td>
                                            <td>{{ $barang->qty >= 1 ? $barang->harga / $barang->qty : $barang->harga }}
                                            </td>
                                            <td>
                                                {{ $barang->status }}
                                            </td>
                                            <td>
                                                <a class="btn btn-warning"
                                                    href="{{ route('barangs.edit', $barang->id) }}">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada Data</td>
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

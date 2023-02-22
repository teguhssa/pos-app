@extends('layout.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <h4>Tambah Barang</h4>
        </div>
    </div>

    <div class="my-2">
        <a href="/barangs" class="btn btn-primary">Kembali</a>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('barangs.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_barang" class="col-form-label">Nama Barang:</label>
                            <input type="text"
                                class="form-control @error('nama_barang') is-invalid @endif" name="nama_barang" value="{{ old('nama_barang') }}">
                            @error('nama_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="col-form-label">Ketegori:</label>
                            <select class="form-select" name="category_id">
                                <option selected>Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="unit" class="col-form-label">Unit:</label>
                            <select class="form-select" name="unit_id">
                                <option selected>Pilih Unit</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success" style="width: 100%;">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

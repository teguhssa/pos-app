@extends('layout.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <h4>Ubah Data Kategori</h4>
        </div>
    </div>

    <div class="my-2">
        <a href="/categories" class="btn btn-primary">Kembali</a>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('categories.update', $category->id) }}" >
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="nama_kategori" class="col-form-label">Nama Kategori:</label>
                            <input type="text"
                                class="form-control @error('nama_kategori') is-invalid @endif" value="{{ old('name_suplayer', $category->nama_kategori) }}" name="nama_kategori">
                            @error('nama_kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <button type="submit"
                                class="btn btn-success" style="width: 100%;">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

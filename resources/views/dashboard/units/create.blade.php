@extends('layout.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <h4>Tambah Unit</h4>
        </div>
    </div>

    <div class="my-2">
        <a href="/units" class="btn btn-primary">Kembali</a>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('units.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_unit" class="col-form-label">Nama Unit:</label>
                            <input type="text"
                                class="form-control @error('nama_unit') is-invalid @endif" name="nama_unit" value="{{ old('nama_unit') }}">
                            @error('nama_unit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <button type="submit" class="btn btn-success" style="width: 100%;">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

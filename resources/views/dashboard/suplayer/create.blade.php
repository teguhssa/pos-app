@extends('layout.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <h4>Tambah Suplayer</h4>
        </div>
    </div>

    <div class="my-2">
        <a href="/suplayers" class="btn btn-primary">Kembali</a>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('suplayers.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_suplayer" class="col-form-label">Nama Suplayer:</label>
                            <input type="text"
                                class="form-control @error('nama_suplayer') is-invalid @endif" name="nama_suplayer" value="{{ old('nama_suplayer') }}">
                            @error('nama_suplayer')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email"
                                class="form-control @error('email') is-invalid @endif" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="col-form-label">No Telpon:</label>
                            <input type="text"
                                class="form-control @error('no_telp') is-invalid @endif" name="no_telp" value="{{ old('no_telp') }}">
                            @error('no_telp')
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

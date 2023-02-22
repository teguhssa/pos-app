@extends('layout.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <h4>Ubah Data Barang</h4>
        </div>
    </div>

    <div class="my-2">
        <a href="/barangs" class="btn btn-primary">Kembali</a>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('barangs.update', $barang->id) }}">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="nama_barang" class="col-form-label">Nama Barang:</label>
                            <input type="text"
                                class="form-control @error('nama_barang') is-invalid @endif" value="{{ old('nama_barang', $barang->nama_barang) }}" name="nama_barang">
                            @error('nama_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="unit" class="col-form-label">Unit:</label>
                            <select class="form-select" name="unit_id">
                                <option selected>Pilih Unit</option>
                                @foreach ($units as $unit)
                                    @if (old('unit_id', $barang->unit_id) == $unit->id)
                                        <option value="{{ $unit->id }}" selected>{{ $unit->nama_unit }}</option>
                                    @else
                                        <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="col-form-label">Status:</label>
                            <select class="form-select" name="status">
                                <option selected>Pilih Status</option>
                                <option value="aktif" @if($barang->status === "aktif" ) selected @endif>Aktif</option>
                                <option value="non-aktif" @if($barang->status === "non-aktif" ) selected @endif>Tidak Aktif</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success" style="width: 100%;">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

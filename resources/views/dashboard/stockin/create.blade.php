@extends('layout.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <h4>Pembelian Barang</h4>
        </div>
    </div>

    <div class="my-2">
        <a href="/stock-in" class="btn btn-primary">Kembali</a>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('stock-in.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="barang_id" class="col-form-label">Nama Barang:</label>
                            <select class="form-select" name="barang_id">
                                <option selected>Pilih Barang</option>
                                @foreach($barangs as $barang)
                                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="suplayer_id" class="col-form-label">Nama Suplayar:</label>
                            <select class="form-select" name="suplayer_id">
                                <option selected>Pilih Suplayer</option>
                                @foreach($suplayers as $suplayer)
                                    <option value="{{ $suplayer->id }}">{{ $suplayer->nama_suplayer }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="qty" class="col-form-label">Quantity:</label>
                            <input type="number"
                                class="form-control @error('qty') is-invalid @endif" name="qty" id="qty" value="{{ old('qty') }}">
                            @error('qty')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="col-form-label">Harga:</label>
                            <input type="number"
                                class="form-control @error('harga') is-invalid @endif" name="harga" id="harga" value="{{ old('harga') }}">
                            @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="total" class="col-form-label">Total Harga:</label>
                            <input type="number"
                                class="form-control @error('total') is-invalid @endif" name="total" id="total"  value="{{ old('total') }}" readonly>
                            @error('total')
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

    <script>
        const qty = document.querySelector("#qty");
        const harga = document.querySelector("#harga");
        const total = document.querySelector("#total");


        qty.addEventListener('input', hitung);
        harga.addEventListener('input', hitung);

        function hitung() {
            let val1 = parseFloat(qty.value);
            let val2 = parseFloat(harga.value);
            let result = val1*val2;
            total.value = isNaN(result) ? '' : result;
        }
    </script>


@endsection

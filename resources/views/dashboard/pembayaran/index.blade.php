@extends('layout.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <h4>Pembayaran</h4>
        </div>
    </div>

   
    <div>
        <h3><strong id="msg" style="color: red;"></strong></h3>
    </div>

    <form method="pos" id="myForm">
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="status" class="col-form-label">Nama Barang:</label>
                    <select class="form-select barang_id" name="barang_id" required>
                        <option selected>Pilih Barang</option>
                        @foreach ($barangs as $barang)
                            <option data-harga={{ $barang->qty >= 1 ? $barang->harga / $barang->qty : $barang->harga }}
                                value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="qty" class="col-form-label">Quantity:</label>
                    <input type="number"
                        class="form-control qty @error('qty') is-invalid @endif" name="qty" id="qty" required>
                </div>
            </div>
            <div class="col">
                    <div class="mb-3">
                        <label for="harga_barang" class="col-form-label">Harga barang/unit:</label>
                        <input type="number" class="form-control harga" name="harga" id="harga" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="status" class="col-form-label">Unit:</label>
                        <select class="form-select unit_id" name="unit_id" required>
                            <option selected>Pilih Unit</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-success" id="btnForm" style="width: 35%;">Simpan</button>
            </div>
    </form>

    <div class="row pt-5">
        <div class="col-md-12">
            <div id="data-tmp"></div>
        </div>
    </div>

    @include('partial.script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            viewData()
        });

        function viewData(){
            $get = $.post("{{ url('data-tmp') }}", function(response) {
                $('#data-tmp').html(response)
            })
        }

        $('.unit_id').on('change', function() {
            const uni = $(this).find('option:selected').val()
            const v = uni
        })

        $('.barang_id').on('change', function() {
            const selected = $(this).find('option:selected')
            const harga = selected.data('harga')

            $('.harga').val(harga)
        })

        $(document).ready(function() {
            $('#btnForm').click(function(e) {
                e.preventDefault()
                $.ajax({
                    url: "{{ url('/insert-cart') }}",
                    method: 'post',
                    dataType: 'json',
                    data: $('#myForm').serialize(),
                    success: function(result){
                        if(result.success){
                            viewData()
                            $("#myForm").trigger("reset");
                            // $("#msg").text(result.success)
                        } else if(result[0] === 'error') {
                            console.log(result[1])
                            $('#msg').text(result[1])
                        }
                    },
                })
            })
        })

        $('.qty').on('blur', function() {
            var kuantitas = $('.qty').val();

            if (kuantitas <= 0) {
                $('.qty').val(1)
            }
        });
    </script>
@endsection

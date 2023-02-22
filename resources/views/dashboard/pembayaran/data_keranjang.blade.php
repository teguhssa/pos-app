<div class="row">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Quantity</th>
                                <th>Harga/unit</th>
                                <th>Unit</th>
                                <th>Total</th>
                                <th>Tanggal Transaki</th>
                            </tr>
                        </thead>
                        <?php $total_harga = 0; ?>
                        @if ($dataCart->count() >= 1)
                            <tbody>
                                @foreach ($dataCart as $cart)
                                    <?php
                                    $sub_total = $cart->qty * $cart->harga;
                                    $total_harga += $sub_total;
                                    ?>
                                    <tr>
                                        <td>{{ $cart->barang->nama_barang }}</td>
                                        <td>{{ $cart->qty }}</td>
                                        <td>{{ $cart->harga }}</td>
                                        <td>{{ $cart->unit->nama_unit }}</td>
                                        <td>{{ $sub_total }}</td>
                                        <td>{{ $cart->created_at }}</td>
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

<div class="d-flex justify-content-end">
    <div class="card" style="width: 35%;">
        <div class="card-body">
            <h4>Grand Total: Rp. <span><b id="grand_total">{{ $total_harga }}</b></span></h4>
            <form action="" id="formCheckOut">
                <div class="col">
                    <div class="mb-3">
                        <label for="total_bayar" class="col-form-label">Total Bayar:</label>
                        <input type="number" class="form-control total_bayar" name="total_bayar" id="total_bayar"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="kembalian" class="col-form-label">kembalian:</label>
                        <input type="number" class="form-control kembalian" readonly name="kembalian" id="kembalian"
                            required>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control total" name="total" id="total"
                            value="{{ $total_harga }}">
                    </div>
                </div>
                <button class="btn btn-success" id="btnCheckOut" style="width: 100%;">Check out</button>
            </form>
        </div>
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
    });

    $('#total_bayar').on('change', function() {
        let bayar = $('#total_bayar').val()
        let sub = $('#grand_total').text()

        let grand = parseFloat(bayar) - parseFloat(sub)
        document.getElementById('kembalian').value = grand
    })

    $(document).ready(function() {
        $('#btnCheckOut').click(function(e) {
            e.preventDefault()
            $.ajax({
                url: "{{ url('/check-out') }}",
                method: 'post',
                dataType: 'json',
                data: $('#formCheckOut').serialize(),
                success: function(result) {
                    if (result.success) {
                        viewData()
                        $("#myForm").trigger("reset");
                        console.log('success')
                    } else if(result[0] === 'error'){
                        $('#msg').text(result[1])
                    }
                }
            })
        })
    })
</script>

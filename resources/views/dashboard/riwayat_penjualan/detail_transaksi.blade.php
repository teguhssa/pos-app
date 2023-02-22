<div class="row mb-4">
    <div class="col-lg-3">
        ID Transaksi
    </div>
    <div class="col-lg-9">
        : {{ $transaksi->invoice }}
    </div>
    <div class="col-lg-3">
        Tanggal Transaksi
    </div>
    <div class="col-lg-9">
        : {{ $transaksi->created_at }}
    </div>
</div>

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Nama Barang</th>
                <th>Quantity</th>
                <th>Harga</th>
                <th>Unit</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $total_harga = 0; ?>
            @foreach ($datas as $data)
            <?php
                $subtotal = $data->qty * $data->harga;
                $total_harga += $subtotal;
            ?>
            <tr>
                <td>{{ $data->no_trx }}</td>
                <td>{{ $data->nama_barang }}</td>
                <td>{{ $data->qty }}</td>
                <td>{{ $data->harga }}</td>
                <td>{{ $data->nama_unit }}</td>
                <td>{{ $subtotal }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4"></td>
                <td>Grand Total</td>
                <td>{{$total_harga}}</td>
            </tr>
        </tbody>
    </table>
</div>
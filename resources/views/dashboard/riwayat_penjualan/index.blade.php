@extends('layout.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <h4>Riwayat Penjualan</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>Total</th>
                                    <th>Total Bayar</th>
                                    <th>Kembalian</th>
                                    <th>Petugas</th>
                                    <th>Waktu Transaksi</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            @if ($transaksis->count() >= 1)
                                <tbody>
                                    @foreach ($transaksis as $transaksi)
                                        <tr>
                                            <td>{{ $transaksi->invoice }}</td>
                                            <td>{{ $transaksi->total }}</td>
                                            <td>{{ $transaksi->total_bayar }}</td>
                                            <td>{{ $transaksi->kembalian }}</td>
                                            <td>{{ $transaksi->petugas }}</td>
                                            <td>{{ $transaksi->created_at }}</td>
                                            <td>
                                                <button class="btn btn-success btnDetail"
                                                    data-id={{ $transaksi->invoice }}><i
                                                        class="bi bi-eye-fill"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data</td>
                                    </tr>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-detail" data-toggle="modal" data-dismiss="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="max-width: 70%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modalbody"></div>
                </div>
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

        $('.btnDetail').on('click', function() {
            id = $(this).attr('data-id');

            var _post = {
                id: id,
            };

            $get = $.post("{{ url('detail-transaksi') }}", _post, function(response) {
                $('.modal-detail').modal('show');
                $('#modalbody').html(response);
            });
        })
    </script>
@endsection

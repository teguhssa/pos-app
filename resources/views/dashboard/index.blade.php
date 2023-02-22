@extends('layout.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <h4>Dashboard</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">Total penjualan</div>
                <div class="card-body" style="text-align: right;">
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('template/assets/dollar.svg') }}" alt="dollar" width="50%;">
                        </div>
                        <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                            <h5 class="m-0">{{ rupiah_format($total_penjualan) }}</h5>
                            <span class="d-block" style="font-size: 0.75rem;">Total Penjualan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-header bg-warning text-white">Jumlah Penjualan</div>
                <div class="card-body" style="text-align: right;">
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('template/assets/cart.svg') }}" alt="cart" width="50%;">
                        </div>
                        <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                            <h3 class="m-0">{{ $transaksis->count() }}</h3>
                            <span class="d-block" style="font-size: 0.75rem;">Penjualan terbaru</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-header bg-success text-white">Riwayat Pembelian Barang</div>
                <div class="card-body" style="text-align: right;">
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('template/assets/invoice.svg') }}" alt="invoice" width="50%;">
                        </div>
                        <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                            <h3 class="m-0">{{ $stockIns->count() }}</h3>
                            <span class="d-block" style="font-size: 0.75rem;">Total pembelian</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-header bg-danger text-white">Jumlah user</div>
                <div class="card-body" style="text-align: right;">
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('template/assets/user.svg') }}" alt="user" width="50%;">
                        </div>
                        <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                            <h3 class="m-0">{{ $users->count() }}</h3>
                            <span class="d-block" style="font-size: 0.75rem;">User Aktif</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-header bg-dark text-white">Jumlah Barang Aktif</div>
                <div class="card-body" style="text-align: right;">
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('template/assets/sell.svg') }}" alt="warehouse" width="50%;">
                        </div>
                        <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                            <h3 class="m-0">{{ $barang_aktif->count() }}</h3>
                            <span class="d-block" style="font-size: 0.75rem;">Barang Aktif</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-header bg-warning text-white">Jumlah Semua Barang</div>
                <div class="card-body" style="text-align: right;">
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('template/assets/warehouse.svg') }}" alt="user" width="50%;">
                        </div>
                        <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                            <h3 class="m-0">{{ $barangs->count() }}</h3>
                            <span class="d-block" style="font-size: 0.75rem;">Semua Barang</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Data Table
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009/01/12</td>
                                    <td>$86,000</td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2012/03/29</td>
                                    <td>$433,060</td>
                                </tr>
                                <tr>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>33</td>
                                    <td>2008/11/28</td>
                                    <td>$162,700</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@extends('layout.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <h4>Kelola Kategori Barang</h4>
        </div>
    </div>

    <a href="/categories/create" class="btn btn-primary my-3">Tambah Kategori barang</a>

    @if (session()->has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    {{-- table --}}
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Nama Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if ($categories->count() >= 1)
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->nama_kategori }}</td>
                                            <td>
                                                <a class="btn btn-warning"
                                                    href="{{ route('categories.edit', $category->id) }}">Edit</a>

                                                <form action="{{ route('categories.destroy', $category->id) }}"
                                                    class="d-inline" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit"
                                                        onclick="return confirm('Anda yakin?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada Data</td>
                                    </tr>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <h4>user management</h4>
        </div>
    </div>

    <div class="my-2">
        <a href="/users" class="btn btn-primary">Kembali</a>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="nama" class="col-form-label">Nama:</label>
                            <input type="text"
                                value="{{ old('name', $user->name) }}"
                                class="form-control @error('name') is-invalid @endif" id="nama" name="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="username" class="col-form-label">Username:</label>
                            <input type="text"
                                value="{{ old('username', $user->username) }}"
                                class="form-control @error('username') is-invalid @endif" id="username" name="username">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" value="{{ old('email', $user->email) }}"
                                class="form-control @error('email') is-invalid @endif" id="email" name="email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="role" class="col-form-label">Role:</label>
                            <select class="form-select" name="role">
                                <option selected>Pilih Role</option>
                                <option value="admin" @if($user->role === "admin" ) selected @endif>Admin</option>
                                <option value="kasir" @if($user->role === "kasir" ) selected @endif>Kasir</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success" style="width: 100%;">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

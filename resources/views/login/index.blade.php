<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    @include('partial.head')
</head>

<body>

    <section class="vh-100 bg-dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 0.5rem;">
                        <div class="card-body p-5">

                            <h3 class="mb-5">Login</h3>

                            <form action="{{ url('login/authenticate') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="col-form-label">Username:</label>
                                    <input type="text" class="form-control @error('username') is-invalid  @enderror"
                                        id="username" name="username" placeholder="Username.." value="{{ old('username') }}">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="col-form-label">Password:</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                        placeholder="Password..">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" type="submit"
                                    style="width: 100%;">Login</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('partial.script')
</body>

</html>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Sistem Informasi Pembukuan Tabungan Sekolah</h4>
                </div>
                <div class="card-body">
                    <!-- Logo or relevant image -->
                    <div class="text-center mb-4">
                        <img src="{{ asset('image/login.jpg') }}" alt="Tabungan Logo" width="100">
                    </div>

                    <!-- Optional description -->
                    <p class="text-center text-muted">
                        Silakan login untuk mengelola dan melihat data tabungan siswa.
                    </p>

                    <!-- Form login -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan email Anda">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan kata sandi Anda">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Ingat saya
                            </label>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                Masuk ke Sistem Tabungan
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="form-group text-center">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Lupa kata sandi?
                                </a>
                            </div>
                        @endif
                    </form>

                    <!-- Optional footer -->
                    <div class="text-center text-muted mt-4">
                        <p>Belum punya akun? Hubungi admin sekolah untuk mendaftar.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

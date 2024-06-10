@extends('layouts.guest')

@section('content')
    <div class="page page-center">
        <div class="container container-normal py-4">
            <div class="row align-items-center g-4">
                <div class="col-lg">
                    <div class="container-tight">
                        <div class="text-center mb-4">
                            <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark"><img src="#" height="36"
                                    alt="">Sistem Inventori Sparepart PC</a>
                        </div>
                        <div class="card card-md">
                            <div class="card-body">
                                <h2 class="h2 text-center mb-4">LOGIN</h2>
                                <form action="{{ route('Login') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Email') }}</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="{{ __('Masukkan email') }}" required autofocus>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3"></div>
                                    <div class="mb-2">
                                        <label class="form-label">
                                            {{ __('Password') }}
                                        </label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="{{ __('Password') }}" required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-check">
                                            <input type="checkbox" class="form-check-input" name="remember">
                                            <span class="form-check-label">{{ __('Ingat Saya') }}</span>
                                        </label>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary w-100">{{ __('Masuk') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-center text-secondary mt-3">
                            {{ __('Tidak memiliki akun?') }} <a href="{{ route('register') }}">{{ __('Daftar') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg d-none d-lg-block">
                    <img src="{{ asset('dist/static/illustrations/undraw_secure_login_pdn4.svg') }}" height="300"
                        class="d-block mx-auto" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection

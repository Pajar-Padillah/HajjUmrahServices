@extends('layout/auth')
@section('content')
<form action="/authenticate" method="POST">
    @csrf
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input  value="{{ old('username') }}" type="text" name="username" autofocus class="form-control @error('username') is-invalid @enderror" id="username">
        @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    {{-- <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="form-check">
            <input class="form-check-input primary" type="checkbox" value="">
            <label class="form-check-label text-dark">
            Remember me
          </label>
        </div>
        <a class="text-primary fw-bold" href="">Lupa Password?</a>
    </div> --}}
    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Login</button>
    <div class="d-flex align-items-center justify-content-center">
        <p class="fs-4 mb-0 fw-bold">Belum punya akun?</p>
        <a class="text-primary fw-bold ms-2" href="/register"> Register</a>
    </div>
    <a href="/"><small>Kembali</small></a>
</form>
@endsection
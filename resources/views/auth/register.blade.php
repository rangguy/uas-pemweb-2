@extends('auth.masterAuth')

@section('title-document')
    <title>Register</title>
@endsection

@section('auth')
<h4 class="mb-2">Adventure starts here 🚀</h4>
<p class="mb-4">Make your app management easy and fun!</p>

<form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="name" class="form-control" id="name" name="name"
            placeholder="Masukan nama Anda" autofocus required autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email"
            placeholder="Masukan email Anda" autofocus required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Password</label>
        </div>
        <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
    </div>
    <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
            <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
        </div>
        <div class="input-group input-group-merge">
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">Daftar</button>
    </div>
</form>

<p class="text-center">
    <span>Sudah punya akun?</span>
    <a href="{{ route('login') }}">
        <span>Masuk</span>
    </a>
</p>
@endsection
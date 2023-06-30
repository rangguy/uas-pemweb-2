@extends('auth.masterAuth')

@section('title-document')
<title>Login</title>
@endsection

@section('auth')

<h4 class="mb-2">Welcome to Sneat! 👋</h4>
<p class="mb-4">Please sign-in to your account and start the adventure</p>

<form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan alamat email Anda"
            autofocus required autocomplete="email" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Password</label>
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('password.request') }}">
                {{ __('Lupa password?') }}
            </a>
            @endif
        </div>
        <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember-me" />
            <label class="form-check-label" for="remember-me"> Ingat Akun </label>
        </div>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
    </div>
</form>

<p class="text-center">
    <span>Tidak punya akun?</span>
    <a href="{{ route('register') }}">
        <span>Buat akun</span>
    </a>
</p>
@endsection
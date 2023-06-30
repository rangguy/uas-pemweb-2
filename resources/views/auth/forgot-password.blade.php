@extends('auth.masterAuth')

@section('title-document')
    <title>Lupa Password</title>
@endsection

@section('auth')

 <!-- Session Status -->
 <x-auth-session-status class="mb-4" :status="session('status')" />

<h4 class="mb-2">Lupa Password? 🔒</h4>
<p class="mb-4">Masukan email Anda dan kami akan mengirim tautan untuk Anda dapat mengubah password Anda</p>
<form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
    @csrf
    <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input
      type="text"
      class="form-control"
      id="email"
      name="email"
      placeholder="Masukan email Anda"
      autofocus
      required
    />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
  </div>
  <button class="btn btn-primary d-grid w-100" type="submit">Kirim</button>
</form>
<div class="text-center">
  <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
    Kembali ke Login
  </a>
</div>
@endsection
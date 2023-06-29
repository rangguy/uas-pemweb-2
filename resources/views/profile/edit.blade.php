@extends('layouts.master')

@section('title-document')
<title>Halaman Profil</title>
@endsection

@section('title')
<h4 class="fw-bold py-3 mb-4"><a href="/dashboard"><span class="text-muted fw-light">Beranda /</span></a> <a
        href="/profile" class="text-black">Akun</a></h4>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Informasi Akun</h5>
            <!-- Account -->
            <hr class="my-0" />
            <div class="card-body">
                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form id="formUpdateProfil" method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    <div class="mb-3 col-md">
                        <label for="name" class="form-label">Nama</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{ $user->name }}"
                            autofocus required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="mb-3 col-md">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="text" id="email" name="email" value="{{ $user->email }}"
                            autofocus required autofocus autocomplete="email" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                            @endif
                        </div>
                        @endif
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        @if (session('status') === 'profile-updated')
                        <div class="alert alert-success alert-dismissible my-2" role="alert">
                            Berhasil Mengubah Profil!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
        <div class="card mb-4">
            <h5 class="card-header">Ubah Password</h5>
            <!-- Account -->
            <hr class="my-0" />
            <div class="card-body">
                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')
                    <div class="mb-3 col-md">
                        <label for="current_password" class="form-label">Password Saat Ini</label>
                        <input class="form-control" type="password" id="current_password" name="current_password"
                            autofocus required autofocus autocomplete="current-password" />
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div>

                    <div class="mb-3 col-md">
                        <label for="password" class="form-label">Password Baru</label>
                        <input class="form-control" type="password" id="change_password" name="password" autofocus required
                            autofocus autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>

                    <div class="mb-3 col-md">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input class="form-control" type="password" id="password_confirmation"
                            name="password_confirmation" autofocus required autofocus autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        @if (session('status') === 'password-updated')
                        <div class="alert alert-success alert-dismissible my-2" role="alert">
                            Berhasil Mengubah Password!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">Hapus Akun</h5>
            <div class="card-body">
                <div class="mb-3 col-12">
                    <div class="alert alert-warning">
                        <h6 class="alert-heading fw-bold mb-1">Anda yakin ingin menghapus akun?</h6>
                        <p class="mb-0">Sekali Anda menghapus, semua data akan hilang terhapus secara permanen. Masukan
                            password untuk konfirmasi untuk menghapus akun Anda</p>
                    </div>
                </div>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    >Hapus Akun</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Anda yakin ingin menghapus akun?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                <form method="POST" action="{{ route('profile.destroy') }}">
                                    @csrf
                                    @method('delete')
                                    <p>Sekali Anda menghapus, semua data akan hilang terhapus secara permanen. Masukan
                                        password untuk konfirmasi untuk menghapus akun Anda</p>
                                    <div class="mb-3">
                                        <label for="password" class="col-form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('Password') }}">
                                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <input type="submit" class="btn btn-danger" value="Hapus"></input>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

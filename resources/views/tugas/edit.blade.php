@extends('layouts.master')

@section('title-document')
<title>Halaman Tugas</title>
@endsection

@section('title')
<h4 class="fw-bold py-3 mb-4"><a href="/dashboard"><span class="text-muted fw-light">Tabel /</span></a> <a
        href="/tugas" class="text-black">Tugas</a></h4>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Edit Tugas</h5>
            <hr class="my-0" />
            <div class="card-body">
                <form id="formUpdateTugas" method="POST" action="/tugas/{{ $tugas->id }}/">
                    @csrf
                    @method('put')
                    <div class="mb-3 col-md">
                        <label for="nama" class="form-label">Nama</label>
                        <input class="form-control" type="text" id="nama" name="nama" value="{{ $tugas->nama_tugas}}"
                            autofocus required autofocus autocomplete="nama" />
                        <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

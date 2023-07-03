@extends('layouts.master')

@section('title-document')
<title>Halaman Karyawan</title>
@endsection

@section('title')
<h4 class="fw-bold py-3 mb-4"><a href="/dashboard"><span class="text-muted fw-light">Tabel /</span></a> <a
        href="/karyawan" class="text-black">Karyawan</a></h4>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Tambah Karyawan</h5>
            <hr class="my-0" />
            <div class="d-inline">
                <a href="/karyawan" class="btn btn-primary btn-sm  mx-4 my-2">Kembali</a>
            </div>
            <div class="card-body">
                <form id="formTambahKaryawan" method="POST" action="{{ route('karyawan.store') }}">
                    @csrf
                    <div class="mb-3 col-md">
                        <label for="nama" class="form-label">Nama</label>
                        <input class="form-control" type="text" id="nama" name="nama" autofocus required autofocus
                            autocomplete="nama" />
                        <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                    </div>
                    <div class="mb-3 col-md">
                        <label for="proyek_id">Proyek</label>
                        <select class="form-control" name="proyek_id" id="proyek_id">
                            <option value="">--Pilih Proyek--</option>
                            @forelse ($proyek as $item)
                                <option value="{{$item->id}}">{{$item->nama_proyek}}</option>
                            @empty
                                <option value="">Belum ada data proyek</option>
                            @endforelse
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('proyek_id')" />
                    </div>
                    <div class="mb-3 col-md">
                        <label for="tugas_id">Tugas</label>
                        <select class="form-control" name="tugas_id" id="tugas_id">
                            <option value="">--Pilih tugas--</option>
                            @forelse ($tugas as $item)
                                <option value="{{$item->id}}">{{$item->nama_tugas}}</option>
                            @empty
                                <option value="">Belum ada data tugas</option>
                            @endforelse
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('tugas_id')" />
                    </div>
                    <div class="mb-3 col-md">
                        <label for="departemen_id">Departemen</label>
                        <select class="form-control" name="departemen_id" id="departemen_id">
                            <option value="">--Pilih Departemen--</option>
                            @forelse ($departemen as $item)
                                <option value="{{$item->id}}">{{$item->nama_departemen}}</option>
                            @empty
                                <option value="">Belum ada data departemen</option>
                            @endforelse
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('departemen_id')" />
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-success me-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
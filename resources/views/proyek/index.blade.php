@extends('layouts.master')

@section('title-document')
    <title>Halaman Proyek</title>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"/>
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(function () {
            $("#dataTable").DataTable();
        });
    </script>
@endpush

@section('title')
<h4 class="fw-bold py-3 mb-4"><a href="/dashboard"><span class="text-muted fw-light">Tabel /</span></a> <a
        href="/proyek" class="text-black">Proyek</a></h4>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Proyek</h5>
            <hr class="my-0" />
            <div class="d-inline">
                <a href="/proyek/create" class="btn btn-primary btn-sm mx-4 my-2">Tambah</a>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Proyek</th>
                            <th>Aksi</th>
                    </thead>
                    <tbody>
                        @forelse ($proyek as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->nama_proyek }}</td>
                            <td>
                                <form action="/proyek/{{$item->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="/proyek/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
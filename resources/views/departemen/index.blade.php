@extends('layouts.master')

@section('title-document')
    <title>Halaman Departemen</title>
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
        href="/departemen" class="text-black">Departemen</a></h4>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Departemen</h5>
            <hr class="my-0" />
            <div class="d-inline">
                <a href="/departemen/create" class="btn btn-primary btn-sm mx-4 my-2">Tambah</a>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Departemen</th>
                            <th>Aksi</th>
                    </thead>
                    <tbody>
                        @forelse ($departemen as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->nama_departemen }}</td>
                            <td>
                                <form action="/departemen/{{$item->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="/departemen/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
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
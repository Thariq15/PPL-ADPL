@extends('dashboard.layouts.main')

@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome Back, {{auth()->user()->name}}</h1>
</div>
<div class="content">
    <div class="card card-info card-outline">
        <div class="card-header">
            <div class="card-tools">
                <a href="/dashboard/products/create" class="btn btn-success">Tambah Data <i class="fas fa-plus-square"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-boarded">
                <tr>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Harga</th>
                </tr>
                @foreach ($product as $dt)
                <tr>
                    <td>{{ $dt->name }}</td>
                    <td>{{ $dt->body }}</td>
                    <td>Rp.{{ $dt->harga }}</td>
                    <td>
                        <a href="/dashboard/editproduct/{{$dt->id }}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome Back, {{auth()->user()->name}}</h1>
</div>
<div class="content">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3>Tambah Data Produk</h3>
        </div>
        <div class="card-body">
            <div>
                <main class="form-signin w-100 m-auto">
                    <form action="/dashboard/saveproduct" method="post">
                        @csrf
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nama Produk" required>
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="body" class="form-control" id="email" placeholder="Keterangan" Required>
                            <label for="body">Keteragan</label>

                        </div>
                        <div class="form-floating">
                            <input type="integer" name="harga" class="form-control" id="harga" placeholder="Harga" Required>
                            <label for="harga">Harga</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Tambah Data</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
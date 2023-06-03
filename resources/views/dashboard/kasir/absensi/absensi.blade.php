@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
      Tambah Absensi
    </h4>

    <div class="row">
        <div class="col-md-6">
            <div class="card">

                <h5 class="card-header">Absensi</h5>

                <div class="card-body demo-vertical-spacing demo-only-element">
                    @if (session()->has('success-add'))        
                        <div class="alert alert-success alert-dismissible" role="alert">
                        {{ session('success-add') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form method="post" action="{{ route('absensi.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="">Pilih Shift</label>
                            <select name="shift" id="" class="form-control">
                                @foreach ($shift as $item)
                                    <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Status sampai</label>
                            <select name="status" class="form-control">
                                <option value="alpha">alpha</option>
                                <option value="telat">telat</option>
                                <option value="masuk">masuk</option>
                                <option value="ijin">ijin</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">Bukti</label>
                            <input type="file" class="form-control" id="inputGroupFile01">
                        </div>
                        <button class="btn btn-primary">Absen</button>
                    </form>
                </div>
              
            </div>
        </div>
    </div>

</div>
@endsection
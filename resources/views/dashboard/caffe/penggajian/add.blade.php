@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    Gaji Karyawan
  </h4>

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Gaji Karyawan</h5>
         
        </div>
        <div class="card-body">
          @if (session()->has('success-add'))        
            <div class="alert alert-success alert-dismissible" role="alert">
              {{ session('success-add') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <form method="post" action="{{ route('gaji.store') }}">
            @csrf
            <div class="mb-3">
                <label for="">Karyawan</label>
                <select name="user_id" id="" class="form-control">
                    @foreach ($data as $item)  
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Gaji</label>
                <input type="number" class="form-control" name="gaji">
            </div>
            <div class="mb-3">
                <label for="">bulan</label>
                <input type="month" class="form-control" name="month">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
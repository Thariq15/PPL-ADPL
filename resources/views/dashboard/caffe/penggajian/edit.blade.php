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
          <h5 class="mb-0">Edit Gaji Karyawan</h5>
         
        </div>
        <div class="card-body">
          @if (session()->has('success-updated'))        
            <div class="alert alert-success alert-dismissible" role="alert">
              {{ session('success-updated') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <form method="post" action="{{ route('gaji.update') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $data['gaji']->id }}">
            <div class="mb-3">
                <label for="">Gaji</label>
                <input type="number" class="form-control" value="{{ $data['gaji']->gaji }}" name="gaji">
            </div>
            <div class="mb-3">
                <label for="">bulan</label>
                <input type="month" class="form-control" value="{{ $data['gaji']->bulan }}" name="bulan">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
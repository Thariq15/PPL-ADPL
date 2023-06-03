@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    Tambah Absensi
  </h4>

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Absensi Karyawan</h5>
         
        </div>
        <div class="card-body">
          @if (session()->has('success-add'))        
            <div class="alert alert-success alert-dismissible" role="alert">
              {{ session('success-add') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="">Hari</label>
                <input type="day" placeholder="daily working" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Pilih Shift Kerja</label>
                <select placeholder="daily working" class="form-control">
                    <option value="1">Kerja Harian</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="">Start</label>
                <input type="time" placeholder="daily working" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">End</label>
                <input type="time" placeholder="daily working" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
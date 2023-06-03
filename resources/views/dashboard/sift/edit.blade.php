@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    Edit Shift Kerja
  </h4>

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Shift Kerja</h5>
         
        </div>
        <div class="card-body">
          @if (session()->has('success-updated'))        
            <div class="alert alert-success alert-dismissible" role="alert">
              {{ session('success-updated') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <form method="post" action="{{ route('shift.update') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $data->id }}">
            <div class="mb-3">
                <label for="">Judul Shift Kerja</label>
              
                <input type="text" name="judul" value="{{ $data->judul }}" placeholder="daily working" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Start</label>
                <input type="time" name="start" value="{{ $data->start }}" placeholder="daily working" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">End</label>
                <input type="time" name="end" value="{{ $data->end }}" placeholder="daily working" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
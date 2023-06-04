@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    Semua Product Caffe
  </h4>

  <div class="row">
    @foreach ($data as $item)      
      <div class="col-md-3 col-sm-6 mb-3">
        <div class="card">
          <div class="card-body">
            <img src="{{ asset($item->image) }}" class="rounded img-thumbnail" style="height: 12rem; width: 100%; object-fit: cover!important;" alt="">

            <h4 class="card-title mt-2">{{ $item->name }}</h4>
            <p>{{ $item->description }}</p>
            <span class="col text-start">
              Rp. {{ number_format($item->price,0,',','.') }},00 ,-
            </span>
            
            @if (Auth::user()->position == 'Karyawan')  
              {{-- <button type="button" data-toggle="modal"data-bs-target="#modalCenter" class="btn btn-primary d-block mt-3">Pesan</button> --}}
    
            @else
              <a href="{{ route('menu.edit', $item->id) }}" class="btn btn-primary d-block mt-3">Edit</a>
            @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection

@section('script')
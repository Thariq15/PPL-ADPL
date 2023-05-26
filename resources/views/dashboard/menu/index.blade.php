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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
            <span class="col text-start">
              Rp. {{ number_format($item->price,0,',','.') }},00 ,-
            </span>
            
            @if (Auth::user()->position == 'Karyawan')  
              <button type="button" data-toggle="modal"data-bs-target="#modalCenter" class="btn btn-primary d-block mt-3">Pesan</button>
              <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col mb-3">
                          <label for="nameBasic" class="form-label">Name</label>
                          <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="row g-2">
                        <div class="col mb-0">
                          <label for="emailBasic" class="form-label">Email</label>
                          <input type="text" id="emailBasic" class="form-control" placeholder="xxxx@xxx.xx">
                        </div>
                        <div class="col mb-0">
                          <label for="dobBasic" class="form-label">DOB</label>
                          <input type="text" id="dobBasic" class="form-control" placeholder="DD / MM / YY">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                      </button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
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
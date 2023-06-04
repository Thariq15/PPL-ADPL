@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    Semua Product Kebun
  </h4>

  <div class="row">

    @foreach ($data as $item)      
      <div class="col-md-3 col-sm-6 mb-3">
        <div class="card">
          <div class="card-body">
            <img src="{{ asset($item->image) }}" class="rounded img-thumbnail" style="height: 12rem; width: 100%; object-fit: cover!important;" alt="">

            <h4 class="card-title mt-2">{{ $item->name }}</h4>
            <p>{{ $item->description }}</p>
            <div class="row">
              <span class="col text-start">
                Rp. {{ number_format($item->price,0,',','.') }},00 ,-
              </span>
              <span class="col text-start">
                Stok {{ $item->stock }} kg
              </span>
            </div>

            
            <button 
              class="btn btn-primary d-block mt-3"
              data-bs-toggle="modal"
              data-bs-target="#pesan{{ $item->id }}"
              >Pesan</button>
              <!-- Modal -->
              <div class="modal fade" id="pesan{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalCenterTitle">
                        Pesanan dari {{ $item->name }}
                      </h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{ route('supply.store') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <input type="hidden" name="name" value="{{ $item->name }}">
                        <input type="hidden" name="price" value="{{ $item->price }}">
                        <div class="mb-3">
                          <input type="number" name="stock" class="form-control">
                        </div>
                        <button class="btn btn-primary">Pesan</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                      </button>
                    </div>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
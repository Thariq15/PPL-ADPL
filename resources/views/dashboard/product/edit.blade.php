@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    Tambah Product
  </h4>

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Product</h5>
         
        </div>
        <div class="card-body">
          @if (session()->has('success-add'))        
            <div class="alert alert-success alert-dismissible" role="alert">
              {{ session('success-add') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Nama Product</label>
              <input type="text" class="form-control" id="basic-default-fullname" value="{{ $product->name }}" name="name" placeholder="John Doe">
              @if ($errors->get('name'))
                @foreach ( $errors->get('name') as $msg)
                  <p class="text-danger">{{ $msg }}</p>
                @endforeach
              @endif
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-company">Harga Product (per KG)</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">Rp.</span>
                <input type="number" class="form-control" placeholder="100" value="{{ $product->price }}" name="price">
                <span class="input-group-text">.00</span>
              </div>
              @if ($errors->get('price'))
                @foreach ( $errors->get('price') as $msg)
                  <p class="text-danger">{{ $msg }}</p>
                @endforeach
              @endif
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-company">Stock (satuan KG)</label>
              <div class="input-group input-group-merge">
                {{-- <span class="input-group-text">Rp.</span> --}}
                <input type="number" class="form-control" placeholder="100" name="stock"  value="{{ $product->stock }}">
                <span class="input-group-text">KG</span>
              </div>
              @if ($errors->get('price'))
                @foreach ( $errors->get('price') as $msg)
                  <p class="text-danger">{{ $msg }}</p>
                @endforeach
              @endif
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">Foto Product</label>
              <input class="form-control" name="image" type="file" id="formFile">
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-message">Desikripsi</label>
              <textarea name="description" id="basic-default-message" class="form-control" placeholder="Berikan keterangan sesuai menu yg anda tambah">{{ $product->description }}</textarea>
              @if ($errors->get('description'))
                @foreach ( $errors->get('description') as $msg)
                  <p class="text-danger">{{ $msg }}</p>
                @endforeach
              @endif
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
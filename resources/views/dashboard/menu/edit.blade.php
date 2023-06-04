@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    Edit Menu Caffe
  </h4>

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Menu</h5>
         
        </div>
        <div class="card-body">
          @if (session()->has('success-updated'))        
            <div class="alert alert-success alert-dismissible" role="alert">
              {{ session('success-updated') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <form action="{{ route('menu.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $menu->id }}">
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Nama Menu</label>
              <input type="text" class="form-control" id="basic-default-fullname" value="{{ $menu->name }}" name="name" placeholder="John Doe">
              @if ($errors->get('name'))
                @foreach ( $errors->get('name') as $msg)
                  <p class="text-danger">{{ $msg }}</p>
                @endforeach
              @endif
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-company">Harga Menu</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">Rp.</span>
                <input type="number" class="form-control" value="{{ $menu->price }}" placeholder="100" name="price">
                <span class="input-group-text">.00</span>
              </div>
              @if ($errors->get('price'))
                @foreach ( $errors->get('price') as $msg)
                  <p class="text-danger">{{ $msg }}</p>
                @endforeach
              @endif
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-phone">Status</label>
              <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="status">
                <option @if ($menu->status == "Ready") selected @endif value="Ready">Ready</option>
                <option @if ($menu->status == "Sold Out") selected @endif value="Sold Out">Sold Out</option>
                <option @if ($menu->status == "Maintaince") selected @endif value="Maintaince">Maintaince</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="formFile" class="form-label">Foto Menu</label>
              <input class="form-control" name="image" type="file" id="formFile">
            </div>
            <div class="mb-3">
              <img src="{{ asset($menu->image) }}" width="150" alt="gambar">
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-message">Desikripsi</label>
              <textarea name="description" id="basic-default-message" class="form-control" placeholder="Berikan keterangan sesuai menu yg anda tambah">{{ $menu->description }}</textarea>
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
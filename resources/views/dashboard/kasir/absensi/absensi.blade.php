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
                    <form action="">
                        <div class="mb-3">
                            <select name="status" id="" class="form-control">
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
@extends('layouts.admin')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    Semua Pemesanan
  </h4>

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row justify-content-end">
            <div class="col-md-2">
              <a href="/" class="btn btn-success">tambah pesanan</a>
            </div>
          </div>
        </div>
        <div class="card-body">

          <table id="example" class="dataTable display" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Antrian</th>
                    <th>Status</th>
                    <th>Amout</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

              @foreach ($data as $item)
                <tr>
                  <td>{{ $item->buyer }}</td>
                  <td>{{ date('Dd', strtotime(date('d-m-Y'))).$item->id }}</td>
                  <td>
                    @if ($item->status == 'proccess')
                        
                      <span class="btn btn-warning">
                    
                    @elseif ($item->status == 'deliver')

                      <span class="btn btn-info">
                    @else
                        <span class="btn btn-success">
                        
                    @endif
                      {{ $item->status }}
                    </span>
                  </td>
                  <td>Rp. 50.500, 00</td>
                  <td>
                    <button class="btn btn-warning">update</button>
                    <button class="btn btn-primary">detail</button>
                </td>
              @endforeach
            </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection


@section('scripts')
<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
@endsection
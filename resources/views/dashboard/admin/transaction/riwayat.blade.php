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
          <div class="row justify-content-end mb-3">
            <div class="col-md-2">

            </div>
          </div>
          @if(session()->has('updated'))                
            <div class="row">
              <div class="col">
                <div class="alert alert-success alert-dismissible" role="alert">
                  {{ session('updated') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
            </div>
          @endif

          @if(session()->has('deleted'))                
          <div class="row">
            <div class="col">
              <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('deleted') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>
          </div>
        @endif
        </div>
        <div class="card-datatable table-responsive">

          <table id="example" class="datatables-basic table border-top" style="width:100%">
            <thead>
                <tr>
                    <th class="sorting">Name</th>
                    <th class="sorting">Antrian</th>
                    <th class="sorting">Status</th>
                    <th class="sorting">Amout</th>
                    <th class="sorting">Action</th>
                </tr>
            </thead>
            <tbody>

              @foreach ($data as $item)
                <?php $jumlah = 0; ?>
                @foreach ($item->detail_transaktions as $dt)
                  <?php $jumlah += $dt->amount ?>
                @endforeach
                <tr>
                  <td>{{ $item->buyer }}</td>
                  <td>{{ date('Dd', strtotime(date('d-m-Y'))).$item->id }}</td>
                  <td>
                    @if ($item->status == 'proccess')
                        
                      <button 
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#updatepesanan{{ $item->id }}"
                      class="btn btn-warning">
                    
                    @elseif ($item->status == 'deliver')

                      <button 
                      type="button"
                      data-bs-toggle="modal"
                      
                      class="btn btn-info">
                    @elseif ($item->status == 'cancel')
                      <button
                      type="button"
                      data-bs-toggle="modal"
                      
                      class="btn btn-danger">                    
                    @else
                        <button
                        type="button"
                        data-bs-toggle="modal"
                        
                        class="btn btn-success">
                    @endif
                      {{ $item->status }}
                    </button>
    
                  </td>
         
                  <td>Rp. {{ number_format($jumlah, 0, '.') }}</td>
                  <td>
                    <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#pesanan{{ $item->id }}"
                  >
                    Detail
                  </button>

                  
                  <!-- Modal -->
                  <div class="modal fade" id="pesanan{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalCenterTitle">
                            Pesanan dari {{ $item->buyer }}
                          </h5>
                          <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                          ></button>
                        </div>
                        <div class="modal-body">
                          <table id="tableModal" class="dataTable display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>menu</th>
                                    <th>jumlah</th>
                                    <th>harga</th>
                                    <th>total</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                
                              @foreach ($item->detail_transaktions as $dt)
                              <tr>
                                <td>{{ $dt->name }}</td>
                                <td>{{ $dt->count + 0 }}</td>
                                <td>Rp. {{ number_format($dt->price, 0, ',', '.') }}</td>
                                <td>{{ number_format($dt->amount, 0, ',', '.') }}</td>
                                
                              </tr>

                              @endforeach
                            </tbody>
                          </table>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
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
    $('#tableModal').DataTable()
});
</script>
@endsection
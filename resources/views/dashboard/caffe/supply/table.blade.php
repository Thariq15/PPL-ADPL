@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
      Semua Supply
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
   

                  <div class="card-datatable table-responsive">
                    @if (session()->has('success-updated'))        
                      <div class="alert alert-success alert-dismissible" role="alert">
                        {{ session('success-updated') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    <table id="example" class="datatables-basic table border-top" style="width:100%">
                      <thead>
                          <tr>
                              <th class="sorting">No.</th>
                              <th class="sorting">Judul</th>
                              <th class="sorting">status</th>
                              <th class="sorting">harga</th>
                              <th class="sorting">jumlah</th>
                              <th class="sorting">total</th>
                              <th class="sorting">action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1; ?>
                          @foreach ($data as $item)
                          <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $item->detail_transaktions[0]->name }}</td>
                              <td>
                                  <span class="badge bg-warning">{{ $item->status }}</span>
                              </td>
                              <td>Rp. {{ number_format($item->detail_transaktions[0]->price) }}</td>
                              <td>{{ ($item->detail_transaktions[0]->count) }} kg</td>
                              <td>
                                  Rp.  {{ number_format($item->detail_transaktions->sum('amount')) }}
                              </td>
                              <td>
                                  <button class="btn btn-success"
                                  data-bs-toggle="modal"
                                  @if ($item->status == 'proccess')  
                                  data-bs-target="#editsupply{{ $item->detail_transaktions[0]->id }}"
                                  @else
                                  disabled 
                                  @endif
                                  >edit</button>
                                  <div class="modal fade" id="editsupply{{ $item->detail_transaktions[0]->id }}" tabindex="-1" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">
                                              Edit Pesanan
                                            </h5>
                                            <button
                                              type="button"
                                              class="btn-close"
                                              data-bs-dismiss="modal"
                                              aria-label="Close"
                                            ></button>
                                          </div>
                                          <div class="modal-body">
                                            <form  method="post" action="{{ route('supply.update') }}">
                                              @csrf
                                              <input type="hidden" name="id" value="{{ $item->detail_transaktions[0]->id }}" >
                                              <div class="mb-3">
                                                <label class="form-label">
                                                  Jumlah
                                                </label>
                                                <input type="text" name="stock" value="{{ $item->detail_transaktions[0]->count }}" class="form-control">
                                              </div>
                                              <div>
                                                <button class="btn btn-primary">Save</button>
                                              </div>
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
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
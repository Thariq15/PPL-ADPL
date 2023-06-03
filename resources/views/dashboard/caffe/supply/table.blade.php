@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
      Absensi
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
   

                  <div class="card-datatable table-responsive">

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
          

                        <tr>
                            <td>1</td>
                            <td>Kopi Luwak</td>
                            <td>
                                <span class="badge bg-warning">proccess</span>
                            </td>
                            <td>Rp. 20.000</td>
                            <td>10 kg</td>
                            <td>
                                Rp. 200.000
                            </td>
                            <td>
                                <button class="btn btn-success"
                                data-bs-toggle="modal"
                                data-bs-target="#editsupply"
                                >edit</button>
                                <div class="modal fade" id="editsupply" tabindex="-1" aria-hidden="true">
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
                                          <form  method="post">
                                            @csrf
                                            <input type="hidden" name="id" >
                                            <div class="mb-3">
                                              <label class="form-label">
                                                Jumlah
                                              </label>
                                              <input type="text" class="form-control">
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
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
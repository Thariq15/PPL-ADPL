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
                              <th class="sorting">Judul</th>
                              <th class="sorting">Mulai</th>
                              <th class="sorting">Berakhir</th>
                              <th class="sorting">Status</th>
                              @if (Auth::user()->position == 'Karyawan')  
                                <th class="sorting">Action</th>
                              @endif
                          </tr>
                      </thead>
                      <tbody>
          

                        <tr>
                            <td>Kerja Harian</td>
                            <td>08:00 AM</td>
                            <td>16:00 PM</td>
                            <td>
                                <span class="badge bg-success">Masuk</span>
                            </td>
                            <td>
                                @if (Auth::user()->position == 'Karyawam')
                                    <a href="" class="btn btn-primary">
                                        absen
                                    </a>
                                @endif
                            </td>
                        </tr>

                        {{-- <tr>
                            <td>Lembur</td>
                            <td>08:00 AM</td>
                            <td>16:00 PM</td>
                            <td>
                                <span class="badge bg-success">Masuk</span>

                            </td>
                            <td>
                                <a href="" class="btn btn-primary">
                                    absen
                                </a>
                            </td>
                        </tr> --}}
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
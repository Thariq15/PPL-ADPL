@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            Penggajian
        </h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
    

                    <div class="card-datatable table-responsive">

                        <table id="example" class="datatables-basic table border-top" style="width:100%">
                        <thead>
                            <tr>
                                <th class="sorting">Nama</th>
                                <th class="sorting">Tanggal</th>
                                <th class="sorting">Status</th>
                                <th class="sorting">Action</th>
                            </tr>
                        </thead>
                        <tbody>
            

                            <tr>
                                <td>Sushi</td>
                                <td>08-09-2023</td>
                                <td>
                                    <span class="badge bg-warning">Belum</span>
                                </td>
                                @if (Auth::user()->position == 'Admin Caffe')
                      
                                <td>
                                    <a href="{{ route('gaji.add') }}" class="btn btn-primary">Gaji</a>
                                    {{--  jika status sudah di gaji saja --}}
                                    <a href="{{ route('gaji.edit', 1) }}" class="btn btn-warning">Edit</a>
                                </td>
                            @endif
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
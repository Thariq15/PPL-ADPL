@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            Keuangan
        </h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
    
                    <div class="card-datatable table-responsive">

                        <table id="example" class="datatables-basic table border-top" style="width:100%">
                        <thead>
                            <tr>
                                <th class="sorting">Keterangan</th>
                                <th class="sorting">Jenis</th>
                                <th class="sorting">Nominal</th>

                                    <th class="sorting">Action</th>
                         
                            </tr>
                        </thead>
                        <tbody>
                            
                                @foreach ($data as $item)                                
                                    <tr>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->jenis }}</td>
                                        <td>{{ $item->nominal }}</td>                        
                                        <td>
                                            <a href="/" class="btn btn-success">Edit</a>
                                            <a href="/dashboard" class="btn btn-danger">Delete</a>
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
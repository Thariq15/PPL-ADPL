@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            Sift Kerja
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
                                @if (Auth::user()->position == 'Admin Caffe')
                                    <th class="sorting">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            
                            
                            @foreach ($data as $item)                                
                                <tr>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->start }}</td>
                                    <td>{{ $item->end }}</td>
                                    @if (Auth::user()->position == 'Admin Caffe')
                        
                                    <td>
                                        <a href="{{ route('shift.edit',$item->id) }}" class="btn btn-success">Edit</a>
                                        <a href="/dashboard" class="btn btn-danger">Delete</a>
                                    </td>
                                @endif
                                </tr>
                            @endforeach


                            {{-- <tr>
                                <td>Lembur</td>
                                <td>08:00 AM</td>
                                <td>16:00 PM</td>
                                @if (Auth::user()->position == 'Admin Caffe')
                      
                                    <td>
                                        <a href="/dashboard" class="btn btn-success">Edit</a>
                                        <a href="/dashboard" class="btn btn-danger">Delete</a>
                                    </td>
                                @endif
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
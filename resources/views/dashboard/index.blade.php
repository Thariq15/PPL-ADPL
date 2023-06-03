@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        Dashboard
    </h4>


    @if (Auth::user()->position == 'Karyawan')

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header m-0 me-2 pb-3">Shift Kerja Hari Ini</h1>
                    <div class="card-body mt-3">

                        <div class="row mt-2">
                            <div class="col-md-12 p-3 alert alert-secondary rounded">
                                <h4>Kerja harian biasa</h6>
                                <span>08:00 AM - 18:00 PM</span>
                            </div>
                        </div>


                        <div class="row mt-2">
                            <div class="col-md-12 p-3 alert alert-secondary rounded">
                                <h4>Lembur Malam</h6>
                                <span>19:00 AM - 23:00 PM</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header m-0 me-2 pb-3">Absensi</h1>
                    <div class="card-body mt-3">


                        <a href="/" class="row mt-2 alert alert-success rounded align-items-center justify-content-center">
                            <div class="col-md-10">
                                <h4>Kerja harian biasa</h6>
                                <span>08:00 AM - 09:00 PM</span>
                            </div>
                            <div class="col-md-2">
                                <i class='bx bx-calendar'></i>
                            </div>
                        </a>
                    
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <h5>Pesanan yg berlangsung</h5>
            <div class="row">

                @foreach ($data["pesanan"] as $item)
                    <div class="col-md-12 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="http://127.0.0.1:8000/assets/img/menu/h90x2fPi.png" class="rounded img-thumbnail" style="height: 5rem; width: 100%; object-fit: cover!important;" alt=""> 
                                    </div>
                                    <div class="col-md-8"> 
                                        <span>{{ $item->buyer }}</span>
                                        <br>
                                        <span>Rp. {{ number_format($item->amount) }}</span>
                                        <br> 
                                        <span>Status : {{ $item->status }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


</div>
@endsection
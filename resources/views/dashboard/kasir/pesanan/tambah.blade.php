@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-3 justify-content-between">
        <h4 class="col-md-4 fw-bold py-3 mb-4">
          Semua Product Caffe
        </h4>
        <button 
            class="col-md-3 d-block btn btn-primary" 
            id="keranjang"
            data-bs-toggle="modal"
            data-bs-target="#modal1"
        >Lihat Kerangjang</button>
                  
        <!-- Modal -->
        <div class="modal fade" id="modal1" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">
                Daftar Pesanan
                </h5>
                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3" id="semuakeranjang">
               
                </div>
                <div class="row mb-3">
                    <span class="total_pembayaran"></span>
                </div>
                <div class="row mb-3">
                    <form>
                        <input type="text" id="nama_pelanggan" placeholder="Masukan nama pelanggan" class="form-control mb-3">
                        <button type="button" id="tombol_pesan" class="btn btn-primary">
                            Pesan
                        </button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
                </button>
            </div>
            </div>
        </div>
        </div>
    </div>

  <div class="row">
    @foreach ($data as $item)      
      <div class="col-md-12 mb-3">
        <div class="card">
          <div class="card-body row">
            <div class="col-md-3">

                <img src="{{ asset($item->image == 'default.png' ? 'assets/img/product/h3EYuQVc.jpg' : $item->image ) }}" class="rounded img-thumbnail" style="height: 12rem; width: 100%; object-fit: cover!important;" alt="">
            </div>

            <div class="col-md-9">
                <h4 class="card-title mt-2">{{ $item->name }}</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
                <span class="col text-start">
                  Rp. {{ number_format($item->price,0,',','.') }},00 ,-
                </span>
                <div class="mt-3 row justify-content-between">
                    <div class="col-md-5">
                        <input class="col-md-6 form-control" type="number" value="1" name="jumlah" id="jumlah-menu{{ $item->id }}">
                    </div>
                    <button
                    type="button"
                    class="btn btn-primary col-md-3 tombolMenu"
                    data-id="{{ $item->id }}"
                    data-img="{{ $item->image }}"
                    data-name="{{ $item->name }}"
                    data-price="{{ $item->price }}"
                    >
                    Pesan
                  </button>


                </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection


@section('scripts')
<script>

        let allPesanan = [];
        var htmlElement = ""
        let jumlah = 0
        $( ".tombolMenu" ).on( "click", function() {
            htmlElement = ""
            const count = $("#jumlah-menu"+$(this).attr('data-id')).val()
            const menu = {
                id: $(this).attr('data-id'),
                name: $(this).attr('data-name'),
                img: $(this).attr('data-img'),
                count,
                price: $(this).attr('data-price'),
                amount: Number($(this).attr('data-price')) * count
            }
            var isExist = false
            var position = -1
            for (let i = 0; i < allPesanan.length; i++) {
                if (allPesanan[i]["id"] == menu["id"]){
                    isExist = true
                    position = i
                    break
                } 
            }

            if (isExist) {
                allPesanan.splice(position, 1)
                
            }
            
            allPesanan.push(menu)
            console.log(allPesanan)
            allPesanan.map((menu) => {
                htmlElement += `<div class="col-md-12 mb-2"><div class="card"><div class="card-body row"><div class="col-md-3"><img src="https://127.0.0.0:8000/${menu["img"]}" class="rounded img-thumbnail" style="height: 100%; width: 100%; object-fit: cover!important;" alt=""> </div><div class="col-md-8"> <span>${menu["name"]}</span><br><span>Rp. ${menu["price"]}</span><br> <span>jumlah : ${menu["count"]}</span><br> <span>Total : ${menu["amount"]}</span></div></div></div></div>`
                $("#semuakeranjang").html(htmlElement)
            })

            jumlah = 0
            allPesanan.map(item => {
                jumlah += item["amount"]
            })
            $('.total_pembayaran').html('<span>Yang harus dibayar adalah Rp '+jumlah+'</span>')
            alert("berhasil ditambah")
      

        } );
        if(allPesanan.length == 0){
            $("#semuakeranjang").html('<span>Belum ada pesanan</span>')
            $('.total_pembayaran').html('<span>belum ada</span>')
        }

        $('#tombol_pesan').on('click', () => {

            if(allPesanan.length == 0){
                alert("Harus pilih pesanan dulu")
                return
            }
            let name = $('#nama_pelanggan').val();
            $.ajax({
                method: 'POST',
                url: "/api/kasir/pemesanan/store",
                data: {
                    name,
                    data: allPesanan,
                    amount: jumlah
                 },
                success: (response) => {
                    console.log(response)
                    if(response['msg'] == 'Data berhasil ditambah'){
                        alert('berhasil ditambah pesanannya')
                        window.location = '/kasir/pemesanan/tambah'
                    }
                }
            })
        })

    </script>
@endsection

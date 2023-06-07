<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Keuangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            Melihat data rekap keuangan
        </h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="card-datatable table-responsive">
    
                            <table id="example" class="datatables-basic table border-top" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="sorting">Keterangan</th>
                                    <th class="sorting">Jenis</th>
                                    <th class="sorting">Nominal</th>
                            
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($data as $item)                                
                                        <tr>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>{{ $item->jenis }}</td>
                                            <td>Rp. {{ number_format($item->nominal) }}</td>                        
                
                                    
                                        </tr>
                                    @endforeach
        
    
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <h3>Total Keuangan anda adalah : <span class="text-primary">Rp. {{ number_format($total) }}</span></h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
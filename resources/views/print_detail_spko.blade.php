<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Perintah Kerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <a class="navbar-brand ml-4 mr-auto display-4">PT. Lestari Mulia Sentosa</a>
    </nav>
    <br>
    <div class="container">
        <h1 class="text-center">Surat Peritah Kerja Operator</h1>
        <br><br>
        <div class="row">
            <div class="col-6">
                <span>ID Operator : {{$spko->employee}}</span><br>
                <span>Nama Operator : {{$spko->employees->nama}}</span><br>
                <span>Tanggal Transaksi : {{$spko->trans_date}} </span>
            </div>
            <div class="col-6">
                <span>No SPKO : {{$spko->sw}}</span><br>
                <span>Prosess : {{$spko->process}}</span><br>
                <span>Catatan : {{$spko->remarks}} </span>
            </div>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Deskripsi</th>
                    <th>Carat</th>
                    <th>SKU</th>
                    <th>Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spko->spko_items as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->products->description}}</td>
                        <td>{{$item->products->carat}}</td>
                        <td>{{$item->products->sub_category}}.{{$item->products->serial_no}}.{{$item->products->carat}}</td>
                        <td>{{$item->qty}}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
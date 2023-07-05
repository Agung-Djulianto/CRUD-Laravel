<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Produksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <a class="navbar-brand ml-4 mr-auto display-6">PT. Lestari Mulia Sentosa</a>
</nav>
    <br><br>
    <div class="container">
        <h1 class="text-center">Detail Produksi</h1>
        <br>
        <div class="row">
            <div class="col-6">
            <a href="#" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editspko">Edit</a> <a href="/spko_print/{{$spko->id_spko}}" class="btn btn-outline-secondary btn-sm">Print</a>
                <br>
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
                    <th>Option</th>
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
                        <td><a href="#" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editspkoitem{{$loop->iteration}}">Edit QTY</a></td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    {{-- Modal Edit spko --}}
    <div class="modal fade" id="editspko" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Operator & Tanggal Produksi</h1>
                </div>
                <form action="/edit_spko/{{$spko->id_spko}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label>Operator</label>
                        <select name="employee" class="form-control">
                            @foreach ($employees as $employee)
                            <option value="{{$employee->id_employee}}" @if ($spko->employee == $employee->id_employee) selected @endif>
                                {{$employee->nama}}
                            </option>
                            @endforeach
                        </select>
                        <label>Tanggal Transaksi</label>
                        <input type="date" name="tanggal_transaksi" class="form-control" value="{{$spko->trans_date}}">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Modal Edit Spko_item --}}
    @foreach ($spko->spko_items as $item)
    <div class="modal fade" id="editspkoitem{{$loop->iteration}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit SPKO Item</h1>
                </div>
                <form action="/edit_spkoitem/{{$spko->id_spko}}/{{$item->id}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label>Qty</label>
                        <input type="number" name="qty" class="form-control" value="{{$item->qty}}">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
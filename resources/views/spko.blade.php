<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Produksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <a class="navbar-brand ml-4 mr-auto display-4">PT. Lestari Mulia Sentosa</a>
</nav>
    <div class="container">
    <br><br>
        <h1 class="text-center">List Produksi</h1>
        <br><br>
        <a href="#" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#newspko">Tambah Produksi +</a>
        <br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Remarks</th>
                    <th>Employee</th>
                    <th>Date</th>
                    <th>Process</th>
                    <th>SW</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spkos as $spko)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$spko->remarks}}</td>
                    <td>{{$spko->employees->nama}}</td>
                    <td>{{$spko->trans_date}}</td>
                    <td>{{$spko->process}}</td>
                    <td>{{$spko->sw}}</td>
                    <td><a href="/spko/{{$spko->id_spko}}" class="btn btn-outline-info btn-sm"> Detail</a> 
                    <a href="/delete_spko/{{$spko->id_spko}}" class="btn btn-outline-danger btn-sm"></i>Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    {{-- Modal --}}
    {{-- Create New TX --}}
    <div class="modal fade" id="newspko" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah produksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/" , method="POST">
                    @csrf
                    <div class="modal-body">
                        <label>Remarks</label>
                        <textarea name="remarks" class="form-control"></textarea>
                        <label>Employee</label>
                        <select name="employee" class="form-control" id="">
                            @foreach ($employees as $employee)
                            <option value="{{$employee->id_employee}}">{{$employee->nama}}</option>
                            @endforeach
                        </select>
                        <label>Process</label>
                        <select name="process" class="form-control" id="">
                            @foreach ($process as $proc)
                            <option value="{{$proc}}">{{$proc}}</option>
                            @endforeach
                        </select>
                        <label>Items</label><br>
                        @foreach ($products as $product)
                        <input type="checkbox" class="form-check-input" onclick="var input = document.getElementById('product{{$loop->iteration}}'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" />{{$product->serial_no}} {{$product->description}}
                        <input id="product{{$loop->iteration}}" type="number" class="form-control" name="product_{{$product->id_product}}" disabled="disabled"/>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
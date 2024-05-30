<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beli</title>
    <link rel="stylesheet" href="{{asset('css/font-g.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" >
    @php
        $title = 'Beli';
    @endphp
</head>
<body>
    <div class="container">
        <div class="nav-wrapper" style="margin-top: 10px;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow" style="display: flex;">
                <div class="container-fluid" >
                    <a class="navbar-brand poppins-bold" href="#" style="font-size: 14pt; color:#ff6f61">{{ $title }}</a>
                </div>
                <div class="container-fluid" style="display: flex; justify-content: flex-end; font-size: 12pt;">
                    <a class="navbar-brand poppins-light text-danger" href="{{ route('penjualan') }}" style="font-size: 12pt;">Kembali</a>
                </div>
            </nav>
        </div>
        <div class="container-fluid align-items-center justify-content-center d-flex" style="margin-top: 20px; display: block; flex-direction: column;">
            <div class="container" style="margin-top: 20px; ">
                <div class="card" style="width: 400px; height: 100%">
                    <div class="card-body" style="">
                        <div class="row" style="width: 100%; display: block;">
                            <div class="col-md-12" style="display: flex; justify-content: flex-start`; gap: 15px">
                                <img src="{{asset('storage/images/'.$product->image)}}" alt="" style="width: 200px; heigth: 200px">
                                <div class="col mt-4" style="display: flex; flex-direction: column; gap: 5px">
                                    <p class="poppins-bold" style="margin: 0;">{{ $product->name }}</p>
                                    <p class="poppins-regular" style="margin: 0;">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <div class="row mt-3" style="width: 100%; display: flex; ">
                                <div class="col">
                                    <p class="poppins-bold" style="margin: 0;">Deskripsi</p>
                                    <p class="poppins-regular" style="margin: 0;">{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container" style="display: flex; margin-top: 20px">
                <form action="{{ route('beliproduk', $product->productID)}}" method="post">
                    @csrf
                    <input type="hidden" name="productID" value="{{ $product->productID }}">
                    <div class="form-group">
                        <i class="bi bi-plus">Tambah Barang</i>
                        <input type="number" name="qty" class="form-control" placeholder="Jumlah" style="width: 200px; margin-right: 10px; ">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Beli</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
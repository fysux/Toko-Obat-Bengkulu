@extends('app.dashboard.template.templates')
@section('content')
<p class="card-title poppins-bold">Penjualan</p>
<div class="row" class="poppins-regular" style="display: flex;">
    <div class="col-md-3">
        <div class="card bg-light">
            <div class="card-body">
                <div class="row" style="display: flex; align-items: center; width: 100%; margin: 0; padding: 0;">
                    <div class="col-md-3" style="margin: 0; padding: 0;">
                        <i class="bi bi-arrow-up-right-square-fill"></i>
                    </div>
                    <div class="col">
                        <p class="card-title poppins-bold" style="margin: 0;">Stok Barang</p>
                        @if(session()->has('error'))
                        <p class="card-title poppins-regular" style="margin: 0;">0</p>
                        @else
                        @php 
                            $total_qty = $products->sum('qty');
                        @endphp
                        <p class="card-title poppins-regular" style="margin: 0;">{{ $total_qty }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-light">
            <div class="card-body">
                <div class="row" style="display: flex; justify-content: space-between; align-items: center; width: 100%; margin: 0; padding: 0;">
                    <div class="col-md-3" style="margin: 0; padding: 0;">
                        <i class="bi bi-receipt-cutoff text-dark"></i>
                    </div>
                    <div class="col">
                        <p class="card-title poppins-bold" style="margin: 0;">Penjualan</p>
                        @if($penjualan)
                        <p class="card-title poppins-regular" style="margin: 0;">{{ $penjualan->count() }}</p>
                        @else
                        <p class="card-title poppins-regular" style="margin: 0;">0</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <p class="card-title poppins-bold">Daftar Produk</p>
                <div class="table-responsive">
                    <a href="{{ route('tambahobat') }}" class="btn btn-warning mb-3 tombol" style="float: right;"><i class="bi bi-plus-square-fill"></i>&nbsp;&nbsp;Tambah</a>
                    <style>
                        .tombol {
                            background-color: aliceblue;
                            color: black;
                        }
                    </style>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Kode</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Status</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count_product = $products->count();
                            @endphp
                            @if($count_product == 0)
                            <div class="alert alert-danger mt-5" role="alert">
                                <p class="card-title poppins-regular text-center">
                                    {{ $error }}
                                </p>
                            </div>
                            @endif
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->productID }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td><img src="{{ asset('storage/images/' . $product->image) }}" alt="" style=" width: 100px; height: 100px;"></td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>
                                    <a href="{{ route('editobat', $product->productID) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('hapusobat', $product->productID) }}" class="btn btn-danger btn-sm">Delete</a>
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
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <p class="card-title poppins-bold">Daftar Penjualan</p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Pembeli</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count_penjualan = $penjualan->count();
                            @endphp
                            @if($count_penjualan == 0)
                            <div class="alert alert-danger mt-5" role="alert">
                                <p class="card-title poppins-regular text-center">
                                    {{ $error }}
                                </p>
                            </div>
                            @endif
                            @foreach ($penjualan as $order)
                            <tr>
                                <td>{{ $order->historyID }}</td>
                                <td>{{ $order->order->user->name }}</td>
                                <td>{{ $order->order->product->name }}</td>
                                <td>{{ $order->order->product->price * $order->qty }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
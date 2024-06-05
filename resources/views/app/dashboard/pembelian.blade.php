@php
    $title = "Pembelian";
@endphp
@extends('app.dashboard.template.templateproduct')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="card-title poppins-bold">Pembelian</p>
            <div class="container-fluid" style="width: 100%; display: flex; justify-content: space-between;">
                <div class="row" style="display: flex; flex-direction: flex; justify-content: space-between;width: 100%; margin: 0; padding: 0;">
                    @foreach ($pembelian as $order)
                    <div class="col-mb-12 card" style="margin: 10px; padding: 0; display: flex; justify-content: center; ">
                        <div class="col" style="margin-left: 20px; margin-top: 20px; padding: 0;">
                            <p class="card-title poppins-regular">{{ $order->product->name }}</p>
                            <p class="card-title poppins-regular">Jumlah : {{ $order->qty }}</p>
                            <p class="card-title poppins-regular">Harga : {{ $order->product->price }}</p>
                            <p class="card-title poppins-regular">Total : {{ $order->total }}</p>
                            <p class="card-title poppins-regular">Status : {{ $order->status }}</p>
                        </div>
                        <div class="col" style="margin: 0; padding: 0; display: flex; justify-content: end; margin-top: -180px;">
                            <img src="{{ asset('storage/images/'.$order->product->image) }}" alt="" class="card-img-top" style="width: 200px; height: 200px;">
                        </div>
                    </div>
                    <div class="col" style="display: flex; justify-content: end;">
                        <a href="">
                            <button type="button" class="btn btn-primary">
                                <p class="card-title poppins-regular" style="margin: 0;">Bayar</p>
                            </button>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@php
    $title = "Pembelian";
@endphp
@extends('app.dashboard.template.templateproduct')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="card-title poppins-bold">Pembelian</p>
            <div class="container-fluid" style="width: 100%; display: flex; justify-content: space-between;">
                @foreach ($pembelian as $order)
                <div class="row" style="display: flex; justify-content: space-between; align-items: center; width: 100%; margin: 0; padding: 0;">
                    <div class="col" style="margin: 0; padding: 0;">
                        <p class="card-title poppins-regular">{{ $order->product->name }}</p>
                        <p class="card-title poppins-regular">Jumlah : {{ $order->qty }}</p>
                        <p class="card-title poppins-regular">Harga : {{ $order->product->price }}</p>
                        <p class="card-title poppins-regular">Total : {{ $order->total }}</p>
                        <p class="card-title poppins-regular">Status : {{ $order->status }}</p>
                    </div>
                    <div class="col" style="margin: 0; padding: 0; display: flex; justify-content: flex-end;">
                        <img src="{{ asset('storage/images/'.$order->product->image) }}" alt="" class="card-img-top" style="width: 200px; height: 200px;">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@php
    $title = 'Tambah Produk';
@endphp
@extends('app.dashboard.template.templateproduct')
@section('content')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<p class="card-title poppins-light text-danger" style="opacity: 70%;">Kesalahan informasi bisa menyebabkan pengguna membutuhkan perawatan medis tambahan, yang bisa meningkatkan biaya perawatan kesehatan.</p>
<form action="{{ route('tambahobat') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row" style="display: flex; justify-content: space-between; flex-wrap: column;">
        <div class="col">
            <div class="card" style="width: 200px; height: 200px;">
                <div class="card-body" style="width: 200px; height: 200px;">
                    <img src="" alt="" class="card-img-top" style="width: 100%; height: 100%;">
                </div><br>
            </div>
            <input type="file" name="image" id="image" style="display: flex; margin: 15px auto; justify-content: center; align-items: center; width: 200px;">
        </div>
        <script>
            const image = document.querySelector('#image');
            image.addEventListener('change', (event) => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    document.querySelector('.card-img-top').setAttribute('src', e.target.result);
                };
                reader.readAsDataURL(event.target.files[0]);
            });
        </script>
        <div class="card" style="width: 75%;">
            <div class="card-body">
                <div class="row popins-regular" style="display: block;">
                    <div class="col">
                        <label for="name" class="form-label">Nama Obat</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Obat">
                    </div>
                    <div class="col mt-3">
                        <label for="email" class="form-label">Deskripsi</label>
                        <input type="description" class="form-control" id="email" name="description" placeholder="Deskripsi Obat">
                    </div>
                    <div class="col mt-3">
                        <label for="noHp" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="noHp" name="price" placeholder="Harga Obat">
                    </div>
                    <div class="col mt-3">
                        <label for="noHp" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="noHp" name="qty" placeholder="Stok">
                    </div>
                    <div class="col mt-3">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@php 
    $title = 'Edit Produk';
@endphp
@extends('app.dashboard.template.templateproduct')
@section('content')
<p class="card-title poppins-bold text-danger">Kalau update obat harus update semuanya!</p>
<form action="{{ route('updateobat', $product->productID)  }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row" style="display: flex; justify-content: space-between; flex-wrap: column;">
        <div class="col">
            <div class="card" style="width: 200px; height: 200px;">
                <div class="card-body" style="width: 200px; height: 200px;">
                    <img src="{{ asset('storage/images/'.$product->image) }}" alt="" class="card-img-top" style="width: 100%; height: 100%;">
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
            <div class="card-body" >
                <div class="row popins-regular" style="display: block;">
                    <div class="col">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="col">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $product->description }}">
                    </div>
                    <div class="col mt-3">
                        <label for="noHp" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="noHp" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="col mt-3">
                        <label for="noHp" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="noHp" name="qty" value="{{ $product->qty }}">
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
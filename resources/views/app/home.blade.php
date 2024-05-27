<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-g.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
{{-- cek user apakah sudah login --}}
@if(Auth::check() == true)
     <header class="header poppins-regular">
         <div class="nav-container">
             <span class="logo poppins-bold">P!Obat</span>
             <nav class="nav">
                <ul class="nav--ul__one">
                     <li class="nav-link"><a href="#home"><span class="iconamoon--home-light"></span></a></li>
                     <li class="nav-link"><a href="{{ route('pembelian')}}"><span class="bi--basket"></span></a></li>
                </ul>
                <div class="dropdown">
                    <a href="#dropdownMenu2">
                        <span class="subway--menu dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <p style="font-size: 10pt;">{{ auth()->user()->name }}</p>
                        <li>
                            <a href="{{ route('profile') }}">
                            <button class="dropdown-item" type="button">Akun</button>
                            </a>
                        </li>
                        
                        <p style="font-size: 10pt;">Keluar</p>
                        <li>
                            <a href="{{ route('logout') }}">
                            <button class="dropdown-item-keluar" type="button">Keluar</button>
                            </a>
                        </li>
                    </ul>
                </div>
             </nav>
     </header>
     <section class="hero">
        <div class="hero-container">
            <div class="hero-text">
                <h1 class="hero-heading poppins-bold" style="color: #FF6347">Hai, {{ auth()->user()->name }}</h1>
                <p class="hero-paragraph poppins-light" style="color: black">Selamat datang di P!Obat. Kami akan memberikan informasi tentang obat tradisional yang sedang populer di dunia.</p>
                {{-- buat form cari --}}
                <form action="" method="GET" style="align-items: center; display: flex; gap: 10px; margin: 10px 0;">
                    <input type="text" name="search" placeholder="Cari obat tradisional..." style="padding: 10px; border-radius: 10px; border: 1px solid #FF6347; opocity 1;">
                    <button type="submit" style="background-color: #FF6347 ; color: white; border-radius: 10px; border: none;"><span class="iconamoon--search-thin" style="margin: 0; padding: 0; justify-content: center; align-items: center; display: flex;"></span></button>
                </form>
            </div>
            <img src="{{asset('img/hero.jpg')}}" alt="" class="hero-img">
        </div>
     </section>

     <section class="content">
        <div class="content-container">
            <table class="content-table">
                <thead class="poppins-light">
                    <tr>
                        <th>Obat</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                @php
                    $obat = \App\Models\User::all();
                @endphp
                <tbody class="poppins-light">
                    @foreach ($obat as $obat)
                        <tr>
                            <td>{{ $obat->name }}</td>
                            <td>{{ $obat->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     </section>
@else
    <script>
        alert("Anda harus login terlebih dahulu");
        window.location.href = "{{ route('welcome') }}";
    </script>
@endif
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var dropdownToggle = document.querySelector('.dropdown-toggle');
        var dropdownMenu = document.querySelector('.dropdown-menu');

        dropdownToggle.addEventListener('click', function() {
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>

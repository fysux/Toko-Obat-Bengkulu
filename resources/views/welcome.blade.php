<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font-g.css')}}">
</head>
<body>
    <header class="header poppins-regular">
        <div class="nav-container">
            <span class="logo poppins-bold">P!Obat</span>
            <nav class="nav">
                <ul class="nav--ul__one">
                    <li class="nav-link"><a href="#home">Beranda</a></li>
                    <li class="nav-link"><a href="#contact">Sosial Media</a></li>
                    <li class="nav-link"><a href="#about">Tentang Kami</a></li>
                </ul>
                <ul class="nav--ul__two">
                    <li class="nav-link"><a href="{{ route('login') }}">
                        <button type="button" class="btn poppins-regular">Masuk</button>
                    </a></li>
                    <li class="nav-link"><a href="{{ route('register') }}" class="signup poppins-semibold">Daftar</a></li>
                </ul>
            </nav>
            <span class="hamburger-menu  material-symbols-outlined">Menu</span>
        </div>
    </header>

    <section class="hero">
        <div class="hero-container" id="home">
            <img src="{{asset('img/hero.jpg')}}" alt="" class="hero-img">
            <div class="hero-text">
                <h1 class="hero-heading poppins-bold">Obat<br>Tradisional</h1>
                <p class="hero-paragraph poppins-light">Obat tradisional, sebagai bagian dari warisan budaya yang kaya,
                    memanfaatkan bahan-bahan alami dan teknik pengobatan turun-temurun untuk memelihara kesehatan dan mengobati berbagai penyakit. Dengan prinsip-prinsip filosofis yang mengutamakan keseimbangan dan harmoni, penggunaan obat tradisional telah menjadi pilihan utama dalam perawatan kesehatan di banyak budaya di seluruh dunia. Meskipun telah ada sejarah penggunaan yang panjang, penelitian modern terus dilakukan untuk memahami efektivitasnya dan memastikan keamanannya. Namun, penting untuk diingat bahwa penggunaan obat tradisional harus didasarkan pada pengetahuan yang mendalam dan dapat dipadukan dengan pengobatan medis modern untuk mencapai hasil terbaik dalam perawatan kesehatan.</p>
            </div>
        </div>
        <div class="hero-container" id="about" style="background-color: #151515">
            <div class="hero-text">
                <h1 class="hero-heading poppins-bold" style="color: #FF6347">Kelompok<br>Kami</h1>
                <p class="hero-paragraph poppins-light" style="color: white">"Melalui proyek web kami tentang obat tradisional, kami menyajikan warisan kesehatan alami dari berbagai budaya. Tema ini memperkenalkan pengunjung pada pengobatan tradisional yang didasarkan pada bahan-bahan alami dan teknik turun-temurun, menjaga keberagaman budaya dan pengetahuan kesehatan."</p>
            </div>
            <img src="{{asset('img/hero-2.jpg')}}" alt="" class="hero-img">
        </div>
        <div class="hero-footer" id="contact">
            <p class="poppins-regular">Sosial Media</p><br>
            <a href="https://github.com/fysux"><i class="fa fa-github" style="font-size:36px;"></i></a>
            <a href="https://www.instagram.com/f.y_________/"><i class="fa fa-instagram" style="font-size:36px;"></i></a>
        </div>
    </section>
    <footer>
        <p class="copyright poppins-light">Copyright © 2024 Kelompok Hebat SI22 Unib</p>
    </footer>
    
</body>
<script>
    const hamburgerMenu = document.querySelector(".hamburger-menu");
    const nav = document.querySelector(".nav");

    hamburgerMenu.addEventListener("click", () => {
    nav.classList.toggle("active")
});
</script>
</html>
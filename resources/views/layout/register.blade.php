<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font-g.css')}}">
</head>
<body>
    <section>
        <div class="hero-container" id="home">
            <img src="{{asset('img/3d_login.png')}}" alt="" class="hero-img">
            <div class="hero-text">
                <form action="{{ route('daftardulubang') }}" method="post" class="form">
                    @csrf
                    <h1 class="hero-heading poppins-bold">Daftar</h1><br>
                    <input type="text" name="name" id="name" placeholder="Username" class="input"><br>
                    <input type="email" name="email" id="email" placeholder="Email" class="input"><br>
                    <input type="password" name="password" id="password" placeholder="Sandi" class="input"><br>
                    <input type="password" name="rePassword" id="password" placeholder="Ulangi Sandi" class="input"><br>
                    <button type="submit" class="btn poppins-regular" id="login-button">Daftar</button>
                </form>
                <p class="poppins-regular signup">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
            </div>
        </div>
    </section>
</body>
</html>
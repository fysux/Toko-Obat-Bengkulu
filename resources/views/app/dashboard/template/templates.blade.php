<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="{{asset('css/font-g.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" >
    <style>
        li {
            list-style: none;
        }
        li.active{
            background-color: #FF6347;
            color: white;
        }
        a {
            text-decoration: none;
        }
        a::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #FF6347;
            transition: width .3s;
        }
        a:hover::after {
            width: 100%;
            transition: width .3s;
        }
    </style>
</head>
<body>
    <div class="container-fluid" style="display: flex; gap: 10px; margin: 0; margin-top: 10px; margin-right: 100px;">
        <aside class="sidebar" style="width: 25%; height: 100vh;">
            <div class="card">
                <p class="card-title poppins-bold" style="margin: 10px; font-size: 20px; margin-top: 20px; margin-left: 20px; color: #FF6347;">Profile</p>
                <div class="card-body poppins-regular" style="height: 100vh;">
                    <div class="card bg-light">
                        <p class="card-title poppins-bold" style="margin: 10px; font-size: 12pt; margin-top: 10px; opacity: 50%; margin-bottom: 0;">Utama</p>
                        <div class="card-body">
                            <ul class="nav">
                                <li class="nav-link btn" style="width: 100%;"><a href="{{ route('profile') }}" style="font-size: 12pt; text-decoration: none; color: black;">Profile</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card" style="margin-top: 15px;">
                        <p class="card-title poppins-bold" style="margin: 10px; font-size: 12pt; margin-top: 10px; opacity: 50%; margin-bottom: 0;">Aktivitas</p>
                        <div class="card-body">
                            <ul class="nav">
                                <li class="nav-link btn" style=" width: 100%; margin-bottom: 15px;"><a href="{{ route('penjualan') }}" style="font-size: 12pt; text-decoration: none; color: black;">Penjualan</a></li>
                                <li class="nav-link" style="width: 100%; margin-top: 15px; display: flex; justify-content: center;"><a href="{{ route('home') }}" class="btn btn-danger row" style="width: 100%;">Kembali</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <div class="container-fluid">
            <header class="header poppins-regular" style="width: 100%;">
                <div class="card" style="width: 100%; border: none;">
                    <div class="card-body" style="width: 100%;">
                        <div class="profile" style="display: flex; justify-content: space-between; align-items: center;">
                            <p class="card-title poppins-bold" style="margin: 0; padding: 0; opacity: 80%;">Hi, {{ auth()->user()->name }}</p>
                        </div>
                    </div>
                </div>
            </header>

            <section class="content" style="">
                <div class="card" style="">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </section>
        </div>
        
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
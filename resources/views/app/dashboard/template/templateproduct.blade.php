<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/font-g.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        a {
            text-decoration: none;
            color: white;
        }
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav-wrapper" style="margin-top: 10px;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow" style="display: flex;">
                <div class="container-fluid" >
                    <a class="navbar-brand poppins-bold" href="#" style="font-size: 14pt; color:#ff6f61">{{ $title }}</a>
                </div>
                <div class="container-fluid" style="display: flex; justify-content: flex-end; font-size: 12pt;">
                    <a class="navbar-brand poppins-light text-danger" href="{{ route('home') }}" style="font-size: 12pt;">Kembali</a>
                </div>
            </nav>
        </div>
        <div class="container-fluid" style="margin-top: 20px;">
            <div class="card">
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
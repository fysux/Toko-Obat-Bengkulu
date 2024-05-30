<div>
@extends('app.dashboard.template.templates')
@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $error }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@section('content')
<p class="card-title poppins-bold" style="opacity: 50%;">Akun</p>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    {{-- tombol close --}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
    <div class="card-body">
        <form action="{{ route('update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row" style="display: flex; justify-content: space-between; flex-wrap: column;">
                <div class="col">
                    <div class="card" style="width: 200px; height: 200px;">
                        <div class="card-body" style="width: 200px; height: 200px;">
                            <img src="{{ asset('./storage/images/' . auth()->user()->foto) }}" alt="" class="card-img-top" style="width: 100%; height: 100%;">
                        </div><br>
                    </div>
                    <input type="file" name="foto" id="image" style="display: flex; margin: 15px auto; justify-content: center; align-items: center; width: 200px;" value="{{ auth()->user()->foto }}">
                </div>
                {{-- tambahkan kode javascript untuk menampilkan gambar yang baru diinput user --}}
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
                        <div class="row popins-regular">
                            <div class="col">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
                            </div>
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                            </div>
                            <div class="col-mb-12 mt-3">
                                <label for="noHp" class="form-label">No Hp</label>
                                <input type="text" class="form-control" id="noHp" name="noHp" value="{{ auth()->user()->noHp }}">
                            </div>
                            <div class="col mt-3">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<p class="card-title poppins-bold mt-3" style="opacity: 50%;">Ubah Password</p>
<div class="card mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="col-md-12 mt-3 alert alert-danger" id="passwordMismatch" style="display:none;" role="alert">
                    Password baru dan konfirmasi password tidak sesuai
                </div>
                <form action="{{ route('updatePassword') }}" method="post">
                    @csrf
                    <div class="card" style="">
                        <div class="card-body d-flex" style="">
                            <div class="row popins-regular" style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
                                <div class="col-md-12">
                                    <label for="oldPassword" class="form-label">Password lama</label>
                                    <input type="password" class="form-control" id="oldPassword" name="oldPassword">
                                </div>
                                <div class="col-md-6">
                                    <label for="newPassword" class="form-label">Password baru</label>
                                    <input type="password" class="form-control" id="newPassword" name="newPassword">
                                </div>
                                <div class="col-md-6">
                                    <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                </div>
                                <div class="col mt-3">
                                    <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan</button>
                                </div>
                                <script>
                                    // ambil data newPassword dan confirmPassword dari form
                                    var newPassword = document.getElementById("newPassword");
                                    var confirmPassword = document.getElementById("confirmPassword");
                                    // tambahkan event listener onchange pada setiap elemen input
                                    newPassword.addEventListener("change", function() {
                                        var passwordMismatch = document.getElementById("passwordMismatch");
                                        if (newPassword.value !== confirmPassword.value) {
                                            passwordMismatch.style.display = "block";
                                        } else {
                                            passwordMismatch.style.display = "none";
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<p class="card-title poppins-bold mt-3" style="opacity: 50%;">Level Akun</p>
<div class="card mt-2">
    <div class="card-body">
        <p class="card-text poppins-light text-danger" style="font-size: 10pt; opacity: 80%;">
            Ketika data yang dimasukkan salah, risiko kehilangan integritas dan keakuratan informasi meningkat. Ini bisa menyebabkan keputusan yang tidak tepat, kerugian finansial, reputasi yang rusak, dan konsekuensi hukum.
        </p>
        @php
        $user = auth()->user()->userID;
        $userMaster = \App\Models\UserMaster::where('userID', $user)->first();
        @endphp
        @if($userMaster == null)
        <form action="{{ route('create') }}" method="post">
            @csrf
            <div class="card" style="display: flex; width: 100%;">
                <div class="card-body" style="width: 100%;">
                    <div class="row" style="justify-content: space-between; align-items: center; width: 100%;">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="admin" value="dokter">
                                <label class="form-check-label" for="admin">
                                    Dokter
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="user" value="apoteker">
                                <label class="form-check-label" for="user">
                                    Apoteker
                                </label>
                            </div>
                        </div>
                        {{-- hidden form yang ditampilkan jika salah satu radio dipilih --}}
                        <div class="col-mb-12 mt-3">
                            <input name="name" id="level" placeholder="name" type="text" class="form-control" style="display: none;">
                        </div>
                        <div class="col-mb-12 mt-3">
                            <button type="submit" class="btn btn-primary" id="simpan" style="width: 100%; display: none;">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @else
        <p class="card-title poppins-bold" style="opacity: 50%;">Ubah</p>
        <form action="{{ route('update-master') }}" method="post">
            @csrf
            <div class="card" style="display: flex; width: 100%;">
                <div class="card-body" style="width: 100%;">
                    <div class="row" style="justify-content: space-between; align-items: center;">
                        <div class="col-mb-6" style="width: 50%;">
                            <select name="role" id="" class="form-select">
                                <option value="dokter" @if(auth()->user()->usermaster->role == 'dokter') selected @endif>Dokter</option>
                                <option value="apoteker" @if(auth()->user()->usermaster->role == 'apoteker') selected @endif>Apoteker</option>
                            </select>
                        </div>
                        {{-- hidden form yang ditampilkan jika salah satu radio dipilih --}}
                        <div class="col-mb-6" style="width: 50%;">
                            <input name="name" id="level" value="{{ auth()->user()->usermaster->name }}" type="text" class="form-control">
                        </div>
                        <div class="col-mb-12 mt-3">
                            <button type="submit" class="btn btn-primary" id="simpan" style="width: 100%;">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif
        <script>
            // Mendapatkan referensi ke radio buttons
            const dokterRadio = document.getElementById('admin');
            const apotekerRadio = document.getElementById('user');
            
            // Mendapatkan referensi ke input tersembunyi
            const hiddenInput = document.getElementById('level');

            // Mendapatkan referensi ke button tersembunyi
            const buttonInput = document.getElementById('simpan');
            
            // Menambahkan event listener untuk setiap radio button
            dokterRadio.addEventListener('change', function() {
                if (this.checked) {
                    // Jika dokter dipilih, set nilai input tersembunyi dan tampilkan
                    hiddenInput.value = '';
                    hiddenInput.style.display = 'block';

                    buttonInput.style.display = 'block';
                }
            });
            
            apotekerRadio.addEventListener('change', function() {
                if (this.checked) {
                    // Jika apoteker dipilih, set nilai input tersembunyi dan tampilkan
                    hiddenInput.value = '';
                    hiddenInput.style.display = 'block';
                    buttonInput.style.display = 'block';
                }
            });
        </script>        
    </div>
</div>
@endsection
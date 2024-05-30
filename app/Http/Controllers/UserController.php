<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/')->with('success', 'Login berhasil');
        }
    
        // If authentication fails, redirect back with an error message
        return redirect('/logindulukuy')->with('error', 'Email atau password salah');
    }

    public function register(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $rePassword = $request->rePassword;

        // cek email jangan duplicate
        $user = User::where('email', $email)->first();
        if ($user) {
            return redirect('/daftardulubang')->with('error', 'Email sudah terdaftar');
        }

        // cek password jika salah
        if ($password != $rePassword) {
            return redirect('/daftardulubang')->with('error', 'Password tidak cocok');
        }

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        // password hashing
        $user->password = bcrypt($password);
        $user->save();
        return redirect('/logindulukuy')->with('success', 'Akun berhasil dibuat');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'noHp' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user = User::find(Auth::user()->userID);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->noHp = $request->noHp;

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $filename);
            if($user->foto != null){
                Storage::delete('public/images/'.$user->foto);
            }
            $user->foto = $filename;
        }

        $user->save();

        return redirect('/profile')->with('success', 'Akun berhasil diperbarui');
    }

    public function update_password(Request $request)
    {
        $password = $request->confirmPassword;
        $user = User::find(Auth::user()->userID);
        $user->password = bcrypt($password);
        $user->save();

        return redirect('/profile')->with('success', 'Password berhasil diperbarui');
    }

    public function beli(Request $request, $productID)
    {
        $pembelian = new \App\Models\Order();
        $pembelian->productID = $productID;
        $pembelian->userID = Auth::user()->userID;
        $pembelian->qty = $request->qty;
        $pembelian->total = $pembelian->qty * $pembelian->product->price;
        $pembelian->status = 'pending';
        $pembelian->save();
        $history = new \App\Models\History();
        $history->orderID = $pembelian->orderID;
        $history->qty = $pembelian->qty;
        $history->save();
        return redirect('/')->with('success', 'Pembelian berhasil');
    }

    public function pembelian()
    {
        $pembelian = \App\Models\Order::where('userID', Auth::user()->userID)->get();
        return view('app.dashboard.pembelian', compact('pembelian'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}

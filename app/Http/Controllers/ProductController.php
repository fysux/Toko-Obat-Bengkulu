<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\History;
use App\Models\Order;


class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Ambil userMasterID dari tabel usermaster
        $userMasterID = $user->usermaster && $user->usermaster->userMasterID !== null
        ? $user->usermaster->userMasterID
        : $user->userID;

        if($userMasterID === null) {
            return view('app.dashboard.master')->with('error', 'Akun Tidak Terdaftar Sebagai Dokter / Apoteker');
        }
        
        // Ambil daftar productID berdasarkan userMasterID
        $productIDs = Product::where('userMasterID', $userMasterID)->pluck('productID');
        
        // Ambil data product berdasarkan userMasterID
        $products = Product::where('userMasterID', $userMasterID)->get();

        $orderID = Order::whereIn('productID', $productIDs)->pluck('orderID');
        
        // Ambil data penjualan berdasarkan daftar productID
        $penjualan = History::whereIn('orderID', $orderID)->get();

        // Cek apakah penjualan atau produk kosong
        if ($penjualan->isEmpty() || $products->isEmpty()) {
            return view('app.dashboard.penjualan', compact('products', 'penjualan'))->with('error', 'Belum ada product');
        }

        return view('app.dashboard.penjualan', compact('products', 'penjualan'));
    }

    public function create()
    {
        $userMasterID = Auth::user()->usermaster->userMasterID;

        return view('app.dashboard.product.create', compact('userMasterID'));
    }

    public function store(Request $request)
    {
        $userMasterID = Auth::user()->usermaster->userMasterID;
        $product = new \App\Models\Product();
        $product->userMasterID = $userMasterID;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->qty = $request->qty;
        $image = $request->file('image');
        if ($image) {
			$image_name = $request->name . '.' . $image->getClientOriginalExtension();
			$image->storeAs('public/images', $image_name);
			$product->image = $image_name;
        }
        if ($image == null) {
            return redirect('/penjualan/tambahobat')->with('error', 'Product gagal ditambahkan');
        }
        $product->save();
        return redirect('/penjualan/tambahobat')->with('success', 'Product berhasil ditambahkan');
    }

    public function edit($productID)
    {
        $product = Product::find($productID);

        return view('app.dashboard.product.edit', compact('product'));
    }

    public function update(Request $request, $productID)
    {
        $product = Product::find($productID);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->qty = $request->qty;
        $image = $request->file('image');
        if ($image) {
            $image_name = $request->name . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $image_name);
            $product->image = $image_name;
        }
        $product->save();
        return redirect('/penjualan')->with('success', 'Product berhasil diperbarui');
    }

    public function destroy($productID)
    {
        $product = Product::findorFail($productID);
        $product->delete();
        return redirect('/penjualan')->with('success', 'Product berhasil dihapus');
    }
}

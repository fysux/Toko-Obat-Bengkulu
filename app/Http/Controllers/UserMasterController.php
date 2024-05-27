<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserMaster;

class UserMasterController extends Controller
{
    public function index()
    {
        return view('app.dashboard.master');
    }

    public function create(Request $request)
    {
        $name = $request->name;
        $role = $request->role;
        $userID = Auth::user()->userID;
        $user = new UserMaster();
        $user->userID = $userID;
        $user->name = $name;
        $user->role = $role;
        $user->save();
        return redirect('/profile')->with('success', 'Akun berhasil dibuat');
    }

    public function update(Request $request)
    {
        $name = $request->name;
        $data_role = [];
        $role = $request->role;
        $data_role[] = $role;
        $userID = Auth::user()->userID;
        $user = UserMaster::find($userID);
        $user->name = $name;
        $user->role = $data_role[0];
        $user->save();
        return redirect('/profile')->with('success', 'Akun berhasil diupdate');
    }
}

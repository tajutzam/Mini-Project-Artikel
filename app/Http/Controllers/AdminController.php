<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function penulis()
    {
        $data = Penulis::get();
        return view("admin.penulis", ["data" => $data]);
    }

    public function login(Request $request)
    {
        $res = Auth::guard("admin")->attempt(["username" => $request->username, "password" => $request->password]);
        if ($res) {
            return redirect("admin/artikel")->with("message", "berhasil login");
        } else {
            return back()->withErrors('gagal login harap check username atau password');
        }
    }

    public function logout()
    {
        if (Auth::guard("admin")->check()) {
            Auth::guard("admin")->logout();
            return redirect("admin/login");
        }
    }
}
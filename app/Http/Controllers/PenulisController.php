<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenulisController extends Controller
{
    //

    public function index()
    {
        $id = Auth::guard("penulis")->user()->id;
        $data = Penulis::where("id",$id)->with("artikel", "artikel.detail", "artikel.detail.komentar")->get();
        return view("penulis.home", ["data" => $data]);
    }
    public function login(Request $request)
    {
        $res = Auth::guard("penulis")->attempt(["username" => $request->username, "password" => $request->password]);
        if ($res) {
            $penulis = Auth::guard("penulis")->user();
            if ($penulis->status_user == 1) {
                return redirect("penulis/home")->with("message", "berhasil login");
            } else {
                Auth::guard("penulis")->logout();
                return back()->withErrors("gagal login Akun anda sedang di nonaktifkan");
            }
        } else {
            return back()->withErrors("gagal login harap check username atau password anda");
        }
    }

    public function detailArtikel($id)
    {
        $data = Artikel::where("id", $id)->with("detail", "detail.komentar")->first();
        return view("penulis.detail-artikel", ["data" => $data]);
    }
    public function delete(Request $request)
    {
        $res = Artikel::destroy($request->id_artikel);
        if ($res) {
            return back()->with("message", "berhasil menghapus artikel");
        } else {
            return back()->withErrors("gagal menghapus artikel");
        }
    }
    public function editStatus(Request $request)
    {
        $isUpdated = Penulis::where("id", $request->id)->update([
            "status_user" => $request->status_user
        ]);
        if ($isUpdated) {
            return back()->with("message", "berhasil memperbarui status user");
        } else {
            return back()->withErrors("gagal memperbarui status user");
        }
    }

    public function logout()
    {
        if (Auth::guard("penulis")->check()) {
            Auth::guard("penulis")->logout();
            return redirect("penulis/login")->with("message", "success logout");
        }
    }


    public function register(Request $request)
    {

        $request->validate([
            "username" => ["required", "unique:table_penulis"]
        ]);

        $created = Penulis::create([
            'name' => $request->nama,
            "username" => $request->username,
            "password" => bcrypt($request->password)
        ]);
        if ($created) {
            return redirect("penulis/login")->with("message", "berhasil registrasi");
        } else {
            return back()->withErrors("gagal registrasi terjadi kesalahan");
        }
    }

}
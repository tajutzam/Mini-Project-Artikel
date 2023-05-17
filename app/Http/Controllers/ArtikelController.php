<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    //
    public function index()
    {
        $data = Artikel::with("penulis")->get();
        return view("admin.artikel", ["data" => $data]);
    }


    public function store(Request $request)
    {
        $created = Artikel::create([
            "judul_artikel" => $request->judul_artikel,
            "isi_artikel" => $request->isi_artikel,
            "penulis_id" => Auth::guard("penulis")->user()->id
        ]);
        if ($created != null) {
            return redirect("/penulis/home")->with("message", "berhasil membuat artikel");
        } else {
            return back()->withErrors("gagal membuat artikel");
        }
    }


    public function update(Request $request)
    {
        $updated = Artikel::where("id", $request->id_artikel)->update([
            "judul_artikel" => $request->judul_artikel,
            "isi_artikel" => $request->isi_artikel
        ]);
        if($updated){
            return back()->with("message" , "berhasil memperbarui artikel");
        }else{  
            return back()->withErrors("Gagal memperbarui artikel");
        }
    }

}
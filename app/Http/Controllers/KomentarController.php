<?php

namespace App\Http\Controllers;

use App\Models\DetailArtikel;
use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    //
    public function store(Request $request){
        $komentar = Komentar::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "isi_komentar" => $request->komentar
        ]);
        $idKomentar = $komentar->id;

        DetailArtikel::create([
            "artikel_id" => $request->id_artikel,
            "komentar_id" => $idKomentar
        ]);
        return back()->with("message","berhasil komentar");
    }
}

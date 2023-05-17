<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function showArtikel(){
        $data = Artikel::with(["penulis","detail"])->get();
        return view("home",["data" => $data]);
    }

    public function detailArtikel($id){
        $artikel = Artikel::where("id" , $id)->with(["penulis","detail","detail.komentar"])->first();
        return view("detail" , ["data" => $artikel]);
    }
}

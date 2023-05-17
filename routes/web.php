<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\PenulisController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GuestController::class, "showArtikel"]);
Route::get("/detail/{id}", [GuestController::class, "detailArtikel"]);
Route::post("/detail/addkoment", [KomentarController::class, "store"]);


Route::prefix("penulis")->group(function () {

    Route::get('/register', function () {
        return view("penulis.register");
    })->middleware("penulis_guest");


    Route::post("/register", [PenulisController::class, "register"]);

    Route::get("/tulis-artikel", function () {
        return view("penulis.tulis-artikel");
    })->middleware("penulis");

    Route::post("/tulis-artikel", [ArtikelController::class, "store"])->middleware("penulis");
    Route::post("/edit-artikel", [ArtikelController::class, "update"])->middleware("penulis");

    Route::post("/login", [PenulisController::class, "login"])->name("login");
    Route::get('/login', function () {
        return view("penulis.login");
    })->middleware("penulis_guest");

    Route::get("/home", [PenulisController::class, "index"])->middleware("penulis");
    Route::get("/detail/{id}", [PenulisController::class, "detailArtikel"])->middleware("penulis");
    Route::delete("/detail/delete", [PenulisController::class, "delete"])->middleware("penulis");
    Route::get("/logout", [PenulisController::class, "logout"]);
});


Route::prefix("/admin")->group(function () {
    Route::get("/penulis", [AdminController::class, "penulis"])->middleware("admin");
    Route::put("/penulis/edit", [PenulisController::class, "editStatus"])->middleware("admin");
    Route::get("/artikel", [ArtikelController::class, "index"])->middleware("admin");
    Route::get("/komentar", [ArtikelController::class, "index"])->middleware("admin");

    Route::get("/login", function () {
        return view("admin.login");
    });

    Route::post("/login", [AdminController::class, "login"]);
    Route::get("/logout", [AdminController::class, "logout"])->middleware("admin");

});
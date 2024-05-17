<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['beforeauth'])->group(function () {
    Route::get('/', 'AuthController@index')->name('auth.index');
    Route::post('/', 'AuthController@login')->name('auth.login');
    Route::get('/register', 'AuthController@showregister')->name('auth.register');
    Route::post('/register', 'AuthController@storeregister')->name('auth.storeregister');
});
// Route::middleware(['web', 'auth'])->group(function () {
    Route::middleware(['App\Http\Middleware\Authenticate'])->group(function () {
    Route::get('/logout', 'AuthController@logout')->name('auth.logout');

    Route::prefix('pendeta')->group(function () {
        // Route::get('/', 'HomeController@dashboard')->name('pendeta.index');
        Route::get("/data/jemaat/{nik}", "PendetaController@detailjemaat")->name("pendeta.detailjemaat");
        Route::get("/data/jemaat", 'PendetaController@datajemaat')->name('pendeta.datajemaat');
        Route::get('/pelayangereja', 'PendetaController@pelayan')->name('pendeta.datapelayan');
        Route::get("/data/pelayan/add", 'PendetaController@formpelayan')->name('pendeta.formdatapelayan');
        Route::post("/data/pelayan/add", 'PendetaController@formpelayanprocess')->name('pendeta.formdatapelayan');
        Route::get("/data/pelayan/edit/{id}", 'PendetaController@editdatapelayan')->name('pendeta.editpelayan');
        Route::post('/data/pelayan/edit/{id}', 'PendetaController@updatedatapelayan')->name('pendeta.updatepelayan');

    });
    Route::prefix('pengurusharian')->group(function () {
        // Route::get('/', 'HomeController@dashboardpengurusharian')->name('pengurusharian.index');
        Route::get("/data/keluarga", 'PengurusHarianController@datakeluarga')->name('pengurusharian.datakeluarga');
        Route::get("/data/keluarga/add", 'PengurusHarianController@formkeluarga')->name('pengurusharian.formkeluarga');
        Route::post("/data/keluarga/add", 'PengurusHarianController@formkeluargaprocess')->name('pengurusharian.formkeluarga');
        Route::get("/data/keluarga/{id}", 'PengurusHarianController@detailkeluarga')->name('pengurusharian.detailkeluarga');
        Route::get("/editdatakeluarga/{id}", 'PengurusHarianController@editdatakeluarga')->name('pengurusharian.editdatakeluarga');
        Route::post('/editdatakeluarga/{id}', 'PengurusHarianController@update')->name('pengurusharian.update');
        Route::get("/data/jemaat/add/{idKeluarga}", 'PengurusHarianController@formjemaat')->name('pengurusharian.formjemaat');
        Route::post("/data/jemaat/add/{idKeluarga}", 'PengurusHarianController@formjemaatprocess')->name('pengurusharian.formjemaat');
        Route::get("/data/jemaat/{id}", "PengurusHarianController@detailjemaat")->name("pengurusharian.detailjemaat");
        Route::get("/data/jemaat", 'PengurusHarianController@datajemaat')->name('pengurusharian.datajemaat');
        Route::get("/data/jemaat/edit/{id}", "PengurusHarianController@editdetailjemaat")->name("pengurusharian.editdetailjemaat");
        Route::post("/data/jemaat/edit/{id}", "PengurusHarianController@updateJemaat")->name("pengurusharian.updateJemaat");
        Route::get("/data/statistik", 'PengurusHarianController@datastatistik')->name('pengurusharian.datastatistik');
        Route::get('/pelayangereja', 'PengurusHarianController@pelayan')->name('pengurusharian.datapelayan');
        Route::get("/data/pelayan/add", 'PengurusHarianController@formpelayan')->name('pengurusharian.formdatapelayan');
        Route::post("/data/pelayan/add", 'PengurusHarianController@formpelayanprocess')->name('pengurusharian.formdatapelayan');
        Route::get('/data/sektor', 'PengurusHarianController@showsektor')->name('pengurusharian.sektor');
        Route::get('/editsektor/{id}', 'PengurusHarianController@editsektor')->name('pengurusharian.editsektor');
        Route::put('/editsektor/{id}', 'PengurusHarianController@updatesektor')->name('pengurusharian.updatesektor');
        Route::get('/data/sektor/add', 'PengurusHarianController@createsektor')->name('pengurusharian.createsektor');
        Route::post('/data/sektor/add', 'PengurusHarianController@storesektor')->name('pengurusharian.storesektor');
    });
});
Route::fallback(function () {
    abort(404);
});
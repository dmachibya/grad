<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CertificateController;

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

Route::get('/', function () {
    return redirect("/login");
});

Route::get('/home', [CertificateController::class, 'index']);
Route::get('/certificates', [CertificateController::class, 'certificates']);


Route::post('/certificate/create', [CertificateController::class, 'create']);

Route::get('/certificates/new', function(){
    return view("cert.new");
});
Route::get('/certificate/delete/{id}', [CertificateController::class, 'delete']);
Route::get('/certificate/update/{id}', [CertificateController::class, 'update']);
Route::post('/certificate/update/{id}', [CertificateController::class, 'patch']);
Route::post('/admin/role/{id}', [CertificateController::class, 'role']);


Route::get("/logout", function(){
    Auth::logout();
    return redirect("/");
});


Route::get('/dashboard', [CertificateController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

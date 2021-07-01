<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ClearanceController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;

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
Route::get('/certificates', [CertificateController::class, 'certificates'])->middleware("student");
Route::get('/process/certificates', [CertificateController::class, 'process_certificates'])->middleware("officer");
Route::get('/process/clearances', [CertificateController::class, 'process_clearances'])->middleware("officer");


Route::post('/certificate/create', [CertificateController::class, 'create'])->middleware("student");

Route::get('/certificates/new', function () {
    return view("cert.new");
})->middleware("student");
Route::get('/certificate/delete/{id}', [CertificateController::class, 'delete']);
Route::get('/certificate/update/{id}', [CertificateController::class, 'update']);
Route::post('/certificate/update/{id}', [CertificateController::class, 'patch']);
Route::post('/certificate/move', [CertificateController::class, 'move'])->middleware("officer");
Route::get('/certificate/{who}', [CertificateController::class, 'who'])->middleware("officer");
Route::post('/admin/role/', [CertificateController::class, 'role'])->middleware("admin");

Route::post('/clearance/move', [ClearanceController::class, 'move'])->middleware("officer");
Route::get('/clearance/new', [ClearanceController::class, 'clearance_new'])->middleware("student");
Route::post('/clearance/start', [ClearanceController::class, 'clearance_start'])->middleware("student");
Route::get('/clearance/{who}', [ClearanceController::class, 'who'])->middleware("officer");

//more
Route::get('/admin/courses', [CourseController::class, 'index'])->middleware("admin");
Route::get('/admin/users', [CourseController::class, 'users'])->middleware("admin");
Route::get('/admin/departments', [CourseController::class, 'departments'])->middleware("admin");
Route::post('/admin/department/create', [DepartmentController::class, 'create'])->middleware("admin");
Route::post('/admin/course/create', [CourseController::class, 'create'])->middleware("admin");
Route::post('/admin/department/delete/{id}', [DepartmentController::class, 'delete'])->middleware("admin");
Route::post('/admin/course/delete/{id}', [CourseController::class, 'delete'])->middleware("admin");

Route::get("/logout", function () {
    Auth::logout();
    return redirect("/");
});
Route::get('/register/staff', [RegisteredUserController::class, 'create_staff']);

Route::get('/dashboard', [CertificateController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

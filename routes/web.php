<?php

use App\Http\Controllers\AlumniController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ClearanceController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TranscriptController;
use App\Models\Clearance;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
Route::get('/users', function () {
    return view("users_list")->with("users", User::where("role", "1")
        ->join("courses", "users.course", "=", "courses.id")->join("departments", "courses.department", "=", "departments.id")->get());
})->middleware("officer");

Route::get('/transcript', [TranscriptController::class, 'index']);
Route::post('/transcript/create', [TranscriptController::class, 'create']);
// Route::post('/alumni', [AlumniController::class, 'create']);
Route::post('/alumni/create', [AlumniController::class, 'create']);
Route::get('/transcript/new', [TranscriptController::class, 'new_form']);
Route::get('/alumni', [TranscriptController::class, 'index2']);
Route::get('/alumni/new', [TranscriptController::class, 'new_form2']);

Route::get('/certificates', [CertificateController::class, 'certificates'])->middleware("student");
Route::get('/process/certificates', [CertificateController::class, 'process_certificates'])->middleware("officer");
Route::get('/process/clearances', function () {
    return redirect("/clearance/process");
})->middleware("officer");

Route::get('/hash/{password}', function ($password) {
    return Hash::make($password);
});

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

Route::get('/clearance', [ClearanceController::class, 'index'])->middleware("auth");
Route::post('/clearance/move', [ClearanceController::class, 'move'])->middleware("officer");
Route::get('/clearance/new', [ClearanceController::class, 'clearance_new'])->middleware("student");
Route::post('/clearance/start', [ClearanceController::class, 'clearance_start'])->middleware("student");
Route::get('/clearance/process', [ClearanceController::class, 'process'])->middleware("officer");
Route::get('/clearance/output', [ClearanceController::class, 'output'])->middleware("student");
Route::get('/clearance/{who}', [ClearanceController::class, 'who'])->middleware("officer");
//more
Route::get('/admin/courses', [CourseController::class, 'index'])->middleware("admin");
Route::get('/admin/users', [CourseController::class, 'users'])->middleware("admin");
Route::get('/admin/departments', [CourseController::class, 'departments'])->middleware("admin");
Route::post('/admin/department/create', [DepartmentController::class, 'create'])->middleware("admin");
Route::post('/admin/course/create', [CourseController::class, 'create'])->middleware("admin");
Route::post('/admin/department/delete/{id}', [DepartmentController::class, 'delete'])->middleware("admin");
Route::post('/admin/course/delete/{id}', [CourseController::class, 'delete'])->middleware("admin");

Route::get("/confirm/print", [ClearanceController::class, 'output'])->middleware("auth");

Route::get("/logout", function () {
    Auth::logout();
    return redirect("/");
});
Route::get('/register/staff', [RegisteredUserController::class, 'create_staff']);

Route::get('/dashboard', [CertificateController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

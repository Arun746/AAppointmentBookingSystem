<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\ProfileController;
use App\Models\Doctors;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');


    //users
    // Route::get('users', [UserController::class, 'index'])->name('users.index');
    // Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    // Route::post('/users', [UserController::class, 'store'])->name('users.store');
    // Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    // Route::put('/{user}/updated', [UserController::class, 'update'])->name('users.update');
    // Route::delete('/{user}/deleted', [UserController::class, 'delete'])->name('users.delete');

    Route::resource('users', UserController::class);

    //doctor
    Route::get('/doctors', [DoctorsController::class, 'index'])->name('doctors.index');
    Route::get('/doctors/create', [DoctorsController::class, 'create'])->name('doctors.create');
    Route::post('/doctors', [DoctorsController::class, 'store'])->name('doctors.store');
    Route::get('/doctors/{doctor}/edit', [DoctorsController::class, 'edit'])->name('doctors.edit');
    Route::put('/doctors/{doctor}', [DoctorsController::class, 'update'])->name('doctors.update');
    Route::delete('doctors/{doctor}', [DoctorsController::class, 'delete'])->name('doctors.delete');
});

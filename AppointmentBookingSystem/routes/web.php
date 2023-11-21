<?php
use App\Models\Doctors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AppointmentController;

Route::get('/', function () {
    return view('frontend.welcome');
});


// Route::get('/appointment', function () {
//     return view('appointment.form');
// });

Route::get('/login', function () {
    return view('auth.login');
});


Route::resource('appointment', AppointmentController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('users', UserController::class);

    //doctor
    Route::get('/doctors', [DoctorsController::class, 'index'])->name('doctors.index');
    Route::get('/doctors/{doctor}/show', [DoctorsController::class, 'show'])->name('doctors.profile');
    Route::get('/doctors/create', [DoctorsController::class, 'create'])->name('doctors.create');
    Route::post('/doctors', [DoctorsController::class, 'store'])->name('doctors.store');
    Route::get('/doctors/{doctor}/edit', [DoctorsController::class, 'edit'])->name('doctors.edit');
    Route::put('/doctors/{doctor}', [DoctorsController::class, 'update'])->name('doctors.update');
    Route::delete('doctors/{doctor}', [DoctorsController::class, 'delete'])->name('doctors.delete');

    Route::get('/trash', [TrashController::class, 'index'])->name('doctors.trash');
    Route::get( 'trash/restore/{id}', [TrashController::class, 'restore'])->name('doctors.restore');
    Route::delete('trash/delete/{id}', [TrashController::class, 'destroy'])->name('doctors.forcedelete');

    Route::resource('department', DepartmentController::class);

    Route::resource('schedule', ScheduleController::class);
});

<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Models\Type;
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


Route::get('/',function (){
   return view('index');
});

Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signupStore'])->name('signup.store');


Route::group(['middleware' => ['role:admin']], function () {
    Route::prefix('admin')->group(function(){
        Route::get('dashboard', [DashboardController::class, 'indexAdmin'])->name('admin.dashboard');
        Route::resource('departments',DepartmentController::class);
        Route::resource('users',UserController::class);
        Route::resource('patients',PatientController::class);

        Route::resource('hospitals',HospitalController::class);
        Route::resource('types',TypeController::class);
        Route::resource('drugs',DrugController::class);
        Route::resource('diseases',DiseaseController::class);

    });

    });

Route::get('/logout', [AuthController::class,'logout'])->name('logout');


Route::group(['middleware' => ['role:patient']], function () {
    Route::get('/patient/dashboard', [DashboardController::class, 'indexPatient'])->name('patient.dashboard');
    Route::resource('/patient/bookings',BookingController::class);
    Route::get('patient/new-appointment/{doctorId}/{date}', [AppointmentController::class,'showAppointment'])->name('create.appointment');
    Route::get('patient/my-booking', [BookingController::class,'myBook'])->name('mybook');
});
Route::group(['middleware' => ['role:doctor']], function () {
    Route::get('/doctor/dashboard', [DashboardController::class, 'indexDoctor'])->name('doctor.dashboard');
    Route::resource('/doctor/appointments',AppointmentController::class);
    Route::post('doctor/appointments/check', [AppointmentController::class, 'check'])->name('appointments.check');
    Route::post('doctor/appointments/update',  [AppointmentController::class, 'updateTime'])->name('appointments.updateTime');
    Route::get('doctor/my-appointments',  [BookingController::class, 'myBookDoctor'])->name('appointments.my-book-doctor');
    Route::get('doctor/my-appointments/{booking}/create-prescription',  [BookingController::class, 'createPrescription'])->name('appointments.prescription.create');
    Route::post('doctor/my-appointments/{booking}/create-prescription',  [BookingController::class, 'PrescriptionStore'])->name('appointments.prescription.store');

});

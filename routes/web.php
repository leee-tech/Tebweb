<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Models\Type;
use App\Models\User;
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
    $doctors = User::with('department')->role('doctor')->get();
   return view('index',compact('doctors'));
})->name('home');
//route(get)=> Records or View

//login.index => return view (login)=>
Route::get('/login', [AuthController::class, 'index'])->name('login.index');
//
Route::post('/login', [AuthController::class, 'authLogin'])->name('auth.login');

Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signupStore'])->name('signup.store');
Route::get('/signup-doctor', [AuthController::class, 'signupDoctor'])->name('doctor.signup');
Route::post('/signup-doctor', [AuthController::class, 'signupStoreDoctor'])->name('doctor.signup.store');


Route::group(['middleware' => ['role:admin']], function () {
    Route::prefix('admin')->group(function(){
        Route::get('dashboard', [DashboardController::class, 'indexAdmin'])->name('admin.dashboard');
        Route::resource('users',UserController::class);
        Route::resource('departments',DepartmentController::class);
        Route::resource('patients',PatientController::class);
        Route::resource('hospitals',HospitalController::class);
        Route::resource('types',TypeController::class);
        Route::resource('drugs',DrugController::class);
        Route::resource('diseases',DiseaseController::class);
        Route::get('doctors-active/{user}',[UserController::class,'ActiveDoctor'])->name('doctor.active');
        Route::get('doctors-unactive/{user}',[UserController::class,'UnActiveDoctor'])->name('doctor.unactive');
        Route::get('doctors-admin/{user}',[UserController::class,'ChangeAdmin'])->name('doctor.admin');
        Route::get('doctors-unadmin/{user}',[UserController::class,'UnChangeAdmin'])->name('doctor.unadmin');

        Route::get('/my-profile',[ProfileController::class,'AdminEdit'])->name('admin.profile.edit');
        Route::patch('/my-profile',[ProfileController::class,'updateAdmin'])->name('admin.profile.update');

    });

    });


Route::group(['middleware' => ['role:doctor']], function () {
    Route::resource('/doctor/appointments',AppointmentController::class);
    Route::resource('/doctor/clinics',ClinicController::class);

    Route::get('/doctor/my-profile',[ProfileController::class,'DoctorProfileShow'])->name('doctor.profile.show');
    Route::get('/doctor/doctor-edit',[ProfileController::class,'DoctorProfileEdit'])->name('doctor.profile.edit');
    Route::patch('/doctor/update-doctor',[ProfileController::class,'update'])->name('doctor.profile.update');

    Route::post('doctor/appointments/check', [AppointmentController::class, 'check'])->name('appointments.check');
    Route::post('doctor/appointments/update',  [AppointmentController::class, 'updateTime'])->name('appointments.updateTime');
    Route::get('doctor/my-appointments',  [BookingController::class, 'myBookDoctor'])->name('appointments.my-book-doctor');
    Route::get('doctor/my-appointments/{booking}/create-prescription',  [BookingController::class, 'createPrescription'])->name('appointments.prescription.create');
    Route::post('doctor/my-appointments/{booking}/create-prescription',  [BookingController::class, 'PrescriptionStore'])->name('appointments.prescription.store');
    Route::get('doctor/my-appointments/{booking}/show-prescription',  [BookingController::class, 'ShowPrescription'])->name('appointments.prescription.show');
    Route::get('doctor/my-appointments/{booking}/change-status',[BookingController::class, 'UpdateStatusBooking'])->name('appointments.booking.update-status');
    Route::get('doctor/patient-medical-record',[MedicalRecordController::class, 'getSearchMedicalRecord'])->name('patient.medical.record');
    Route::get('doctor/patient-medical-record/{user}/appointment',[MedicalRecordController::class, 'getAppointmentByPatient'])->name('patient.medical.appointment');
    Route::get('doctor/patient-medical-record/{user}/prescription',[MedicalRecordController::class, 'getAppointmentByPrescription'])->name('patient.medical.prescription');

});




Route::get('/logout', [AuthController::class,'logout'])->name('logout');
Route::group(['middleware' => ['role:patient']], function () {
    Route::resource('/patient/bookings',BookingController::class);
    Route::get('patient/bookings/new-appointment/{doctorId}/{date}', [BookingController::class,'showAppointment'])->name('create.appointment');
    Route::get('patient/my-booking', [BookingController::class,'myBook'])->name('mybook');
    Route::get('patient/my-booking/{booking}/show-prescription', [BookingController::class,'ShowPrescriptionP'])->name('show.prescription');
    Route::get('patient/my-booking/{booking}/rate', [BookingController::class,'rate_view'])->name('rate.view');
    Route::post('patient/my-booking/{booking}/rate', [BookingController::class,'rate'])->name('rate.store');
    Route::get('patient/my-profile',[ProfileController::class,'PatientEdit'])->name('patient.profile.edit');
    Route::patch('patient/my-profile',[ProfileController::class,'updatePatient'])->name('patient.profile.update');

});

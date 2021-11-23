<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TypeController;
use App\Models\Employee;
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

//=>=>=>=>=>Controller (Model + view) => resource => register patiant

//AuthController
Route::get('/', [AuthController::class, 'index'])->name('login.index');

Route::post('/login', [AuthController::class, 'login'])->name('login');
//50>
Route::group(['middleware' => ['role:admin']], function () {
    Route::prefix('admin')->group(function(){
        Route::get('dashboard', [DashboardController::class, 'indexAdmin'])->name('admin.dashboard');
        Route::resource('patients',PatientController::class);
        Route::resource('doctors',DoctorController::class);//admin/doctors
        Route::resource('departments',DepartmentController::class);
        Route::resource('hospitals',HospitalController::class);
        Route::resource('types',TypeController::class);
        Route::resource('drugs',DrugController::class);
        Route::resource('diseases',DiseaseController::class);
    });

//        Route::post('/login', [AuthController::class, 'login'])->name('login');
    });



Route::group(['middleware' => ['role:patient']], function () {
    Route::get('/patient/dashboard', [DashboardController::class, 'indexAdmin'])->name('patient.dashboard');
//        Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::get('/dashboard',function (){
    return view('home.dashboard');
});

Route::get('register',function (){
   return view('register');
});

Route::get('borini',function (){
    return 10+20;
});//get data or view html

Route::get('where-emp',function (){
//    $emp = \App\Models\Employee::find(1);//where id
    $emp_where = Employee::all()->where('salary','>=',1000);
    return $emp_where;
});
Route::get('create-emp',function (){
    $data['name'] = "Husam";
    $data['salary'] = 1500;
    $data['age']=15;
    $data['address']="home";
    //NameModel::create()
    //NameModel::all()->where()
    //NameModel::all()
    Employee::create($data);//insert into
});

Route::get('employees',function (){
    // select * from employees ; =>
    $emp = Employee::all();//select * from employees
    $emp_count = Employee::all()->count();
    return $emp_count;
});








//Route::post(); // create data or send data
//Route::delete();// delete data
//Route::patch();//update data

//Route::get('login-diala',function (){
//   return "hello login";
//});


//get => get data or view
//post => create data
//patch => update data
//delete => remove

//Model => insert update delete select
//View => front
//Controller // write => Model + View


//serach how create laravel project =>
//each route =>
//route return count(table)
//Table => Customer (create - update - delete - select)  php .\artisan make:model Admin -crm


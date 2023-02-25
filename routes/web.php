<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\RelationshipController;

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

Route::get('/', function () {
    return view('welcome');
});
 /////////////////// one to one    /////////////////////////// 

Route::get('/has_one',[RelationshipController::class,"hasRelationship"]);
Route::get('/has_one_revers',[RelationshipController::class,"hasRelationship_reserve"]);
Route::get('/get_user_phone',[RelationshipController::class,"get_user_phone"]);
Route::get('/get_user_wher_not_phone',[RelationshipController::class,"get_user_wher_not_phone"]);
Route::get('/get_user_where_code',[RelationshipController::class,"get_user_where_code"]);


/////   many to many       //////////////////

Route::get('/has_many',[DoctorController::class,"get_doctor_hospital"]);
Route::get('/hosptals',[DoctorController::class,"hosptals"]);
Route::get('/Doctor/{id}',[DoctorController::class,"Doctor"])->name('get_doctor');
Route::get('/hospital_dosnt_have_employees',[DoctorController::class,"hospital_dosnt_have_employees"]);
Route::get('/hospital_get_doctor_where_male',[DoctorController::class,"hospital_get_doctor_where_male"]);
Route::get('/hospital_get_not_doctor',[DoctorController::class,"hospital_get_not_doctor"]);
Route::get('/deleteHospitals/{id}',[DoctorController::class,"delete_hospitals"])->name('deleteHospitals');



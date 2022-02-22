<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register',[App\Http\Controllers\MemberController::class,'memberSignup']);
Route::post('/login',[App\Http\Controllers\LoginController::class,'memberLogin']);
Route::post('/login/admin',[App\Http\Controllers\LoginController::class,'adminLogin']);
Route::post('/contactus',[App\Http\Controllers\ContactUsController::class,'sendMail']);


//member
Route::get('/member/get',[App\Http\Controllers\MemberController::class,'memberGet']);
Route::get('/member/profile/{id}',[App\Http\Controllers\MemberController::class,'memberProfile']);
Route::post('/member/profile/update/{id}',[App\Http\Controllers\MemberController::class,'UpdateMemberProfile']);
Route::get('/member/order/view/{id}',[App\Http\Controllers\OrderController::class,'memberOrders']);


//vehicle
Route::post('/vehicle/add',[App\Http\Controllers\VehicleController::class,'vehicleAdd']);
Route::get('/vehicle/get',[App\Http\Controllers\VehicleController::class,'vehicleGet']);
Route::get('/vehicle/edit/get/{id}',[App\Http\Controllers\VehicleController::class,'vehicleEditGet']);
Route::get('/vehicle/delete/{id}',[App\Http\Controllers\VehicleController::class,'vehicleDelete']);
Route::post('/vehicle/update/{id}',[App\Http\Controllers\VehicleController::class,'vehicleUpdate']);
Route::get('/home/vehicles',[App\Http\Controllers\VehicleController::class,'homepageVehicles']);


//Order
Route::post('/vehicle/rent/{id}',[App\Http\Controllers\OrderController::class,'vehicleRent']);

//Admin
Route::get('/order/view',[App\Http\Controllers\OrderController::class,'View']);
Route::get('/order/approve/{id}/{idd}',[App\Http\Controllers\OrderController::class,'approve']);
Route::get('/order/deny/{id}/{idd}',[App\Http\Controllers\OrderController::class,'deny']);
Route::get('/stats',[App\Http\Controllers\VehicleController::class,'Stats']);

//search
Route::post('/home/search',[App\Http\Controllers\SearchController::class,'homeSearch']);
Route::get('/vehicle/filter/',[App\Http\Controllers\SearchController::class,'Filter']);
Route::post('/vehicle/options/',[App\Http\Controllers\SearchController::class,'options']);
Route::get('/vehicle/filter/view/{id}',[App\Http\Controllers\SearchController::class,'View']);
Route::post('/vehicle/options/',[App\Http\Controllers\SearchController::class,'options']);


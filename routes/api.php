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

Route::post('/signup/member',[App\Http\Controllers\MemberController::class,'memberSignup']);
Route::post('/login/member',[App\Http\Controllers\LoginController::class,'memberLogin']);
Route::post('/login/admin',[App\Http\Controllers\LoginController::class,'adminLogin']);
Route::post('/contact',[App\Http\Controllers\ContactUsController::class,'sendMail']);


//member
Route::get('/member/get',[App\Http\Controllers\MemberController::class,'memberGet']);
Route::get('/member/dashboard/profile/{id}',[App\Http\Controllers\MemberController::class,'memberProfile']);
Route::post('/member/dashboard/profile/update/{id}',[App\Http\Controllers\MemberController::class,'UpdateMemberProfile']);
Route::get('/member/rent/order/view/{id}',[App\Http\Controllers\OrderController::class,'memberOrders']);


//vehicle
Route::post('/vehicle/add',[App\Http\Controllers\VehicleController::class,'vehicleAdd']);
Route::get('/vehicle/get',[App\Http\Controllers\VehicleController::class,'vehicleGet']);
Route::get('/vehicle/edit/get/{id}',[App\Http\Controllers\VehicleController::class,'vehicleEditGet']);
Route::get('/vehicle/delete/{id}',[App\Http\Controllers\VehicleController::class,'vehicleDelete']);
Route::post('/vehicle/update/{id}',[App\Http\Controllers\VehicleController::class,'vehicleUpdate']);
Route::get('/homepage/vehicles',[App\Http\Controllers\VehicleController::class,'homepageVehicles']);


//Order
Route::post('/vehicle/rent/{id}',[App\Http\Controllers\OrderController::class,'vehicleRent']);

//Admin
Route::get('/rent/order/view',[App\Http\Controllers\OrderController::class,'View']);
Route::get('/order/approve/{id}/{idd}',[App\Http\Controllers\OrderController::class,'approve']);
Route::get('/order/deny/{id}/{idd}',[App\Http\Controllers\OrderController::class,'deny']);
Route::get('/stats',[App\Http\Controllers\VehicleController::class,'Stats']);

//search
Route::post('/home/search',[App\Http\Controllers\SearchController::class,'homeSearch']);
Route::get('/vehicle/rent/filter/',[App\Http\Controllers\SearchController::class,'rentFilterSearch']);
Route::post('/vehicle/rent/options/',[App\Http\Controllers\SearchController::class,'options']);
Route::get('/vehicle/rent/filter/view/{id}',[App\Http\Controllers\SearchController::class,'rentFilterSearchView']);
Route::post('/vehicle/rent/options/',[App\Http\Controllers\SearchController::class,'options']);


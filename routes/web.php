<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LgaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});
Route::get('/register',[UserController::class,'index']);
Route::post('/register',[UserController::class,'store']);

Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'login']);



Route::middleware(['UserMiddleware'])->group(function(){
  Route::get('users/{user_id}',[UserController::class,'destroy']); 

  
  Route::get('/statistics',[UserController::class,'statistics']);
  Route::get('/cashout',[TransactionController::class,'cashout']);
  Route::get('/invest',[TransactionController::class,'invest']); 
  Route::get('/i-have-paid',[TransactionController::class,'i_have_paid']);
  Route::get('/unfinished-transactions',[TransactionController::class,'getUnFinishedTransactions']);
  Route::get('/confirm-payment/{member_id}',[TransactionController::class,'confirm_payment']);  
});

Route::get('/downliners',[TransactionController::class,'downliners']);  
Route::get('/dashboard',[UserController::class,'show']);
Route::get('/login',[LoginController::class,'index']);

Route::post("lga-component/{state_id}",[LgaController::class,"getLga"]);
Route::get("lga-component/{state_id}",[LgaController::class,"getLga"]);
/*End of form components routes */


/* admin */
Route::get('admin/dashboard',function(){
  return view("admin.index");
})->name("admin_dashboard");

Route::prefix('admin')->group(function () {
    // Routes for the admin section
    Route::get('users', [AdminController::class,'users'])->name("users");
    Route::get('merge', [AdminController::class,'ShowMerge'])->name("merge");
    Route::get('merge-users', [AdminController::class,'merge']);
});


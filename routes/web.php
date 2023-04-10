<?php

use App\Http\Controllers\Backend\ModuleController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Forntend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
});

Route::get('/page/{page_slug}', [FrontendController::class, 'index']);

Auth::routes();




Route::prefix('admin')->middleware(['auth'])->group(function(){

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/module',ModuleController::class);
    Route::resource('/permission',PermissionController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/page', PageController::class);

    //is_active Route Ajax
    Route::get('check/user/is_active/{user_id}',[UserController::class,'checkActive'])->name('user.is_active.ajax');
    Route::get('check/page/is_active/{page_id}', [PageController::class, 'checkActive'])->name('page.is_active.ajax');

    Route::resource('/user',UserController::class);


    Route::get('update-profile',[ProfileController::class,'getUpdateProfile'])->name('getupdate.profile');
    Route::post('update-profile',[ProfileController::class,'updateProfile'])->name('postupdate.profile');

    Route::get('update-password', [ProfileController::class, 'getUpdatePassword'])->name('getupdate.password');
    Route::post('update-password', [ProfileController::class, 'updatePassword'])->name('postupdate.password');

});

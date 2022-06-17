<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryControllerResource;
use App\Http\Controllers\LoginControllerResoucre;
use App\Http\Controllers\DepartmentControllerResource;
use App\Http\Controllers\PostControllerResource;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Middleware\CheckLoginMiddleware;

Route::get('/', function () {
    return view('home');
})->name('home');

//Login
Route::get('/login', [LoginControllerResoucre::class, 'auth_login'])->name('formLogin');
Route::post('/admin', [LoginControllerResoucre::class, 'submitLogin'])->name('submitLogin');

//Quên mật khẩu
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
//Logout
Route::post('reset-password', [LoginControllerResoucre::class, 'submitLogoutForm'])->name('logout.post');

Route::group(['prefix' => '/admin','middleware' => CheckLoginMiddleware::class], function () {
    //người dùng phải đăng nhập mới có thể truy cập route này

    Route::get('/admin',[PostControllerResource::class,'getFormLogin'])->name('admin');

    Route::group(['prefix' => '/posts', 'as' => 'post.'], function () {
        Route::get('/', [PostControllerResource::class, 'index'])->name('index');

        Route::get('/create', [PostControllerResource::class, 'create'])->name('create');
        Route::post('/create', [PostControllerResource::class, 'store'])->name('store');

        Route::delete('/destroy/{post_ID}', [PostControllerResource::class, 'destroy'])->name('destroy');

        Route::get('/edit/{post_ID}', [PostControllerResource::class, 'edit'])->name('edit');
        Route::put('/edit/{post_ID}', [PostControllerResource::class, 'update'])->name('update');
    });
    Route::group(['prefix' => '/category', 'as' => 'category.'], function () {
        Route::get('/',[CategoryControllerResource::class,'index'])->name('index');
        
        Route::get('/create', [CategoryControllerResource::class, 'create'])->name('create');
        Route::post('/create', [CategoryControllerResource::class, 'store'])->name('store');

        Route::delete('/destroy/{category_ID}', [CategoryControllerResource::class, 'destroy'])->name('destroy');

        Route::get('/edit/{category_ID}', [CategoryControllerResource::class, 'edit'])->name('edit');
        Route::put('/edit/{category_ID}', [CategoryControllerResource::class, 'update'])->name('update');
    
    });

});


Route::resource('/department-manage', DepartmentControllerResource::class);
Route::get('/department-manage', [DepartmentControllerResource::class, 'index']);
Route::get('/edit/department-{id}', [CategoryControllerResource::class, 'edit']);
Route::post('/update/department-{id}', [CategoryControllerResource::class, 'update']);
Route::get('/delete/department-{id}', [CategoryControllerResource::class, 'delete']);

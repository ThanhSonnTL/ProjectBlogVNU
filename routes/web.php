<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryControllerResource;
use App\Http\Controllers\LoginControllerResoucre;
use App\Http\Controllers\DepartmentControllerResource;
use App\Http\Controllers\PostControllerResource;
use App\Http\Controllers\LecturerControllerResource;
use App\Http\Controllers\GuestControllerResource;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Middleware\CheckLoginMiddleware;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::controller(GuestControllerResource::class)->group(function () {
    Route::get('/', 'getAll');
    Route::get('/post','getAll2');
});


//Login
Route::get('/login', [LoginControllerResoucre::class, 'auth_login'])->name('formLogin');
Route::post('/admin', [LoginControllerResoucre::class, 'submitLogin'])->name('submitLogin');


//Quên mật khẩu
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset/password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
//Logout
Route::post('reset-password', [LoginControllerResoucre::class, 'submitLogoutForm'])->name('logout.post');



Route::group(['prefix' => '/admin','middleware' => CheckLoginMiddleware::class], function () {
    //người dùng phải đăng nhập mới có thể truy cập route này

    Route::get('/',[LoginControllerResoucre::class,'getFormLogin'])->name('admin');

    Route::group(['prefix' => '/posts', 'as' => 'post.'], function () {
        Route::get('/', [PostControllerResource::class, 'index'])->name('index');

        Route::get('/create', [PostControllerResource::class, 'create'])->name('create');
        Route::post('/create', [PostControllerResource::class, 'store'])->name('store');

        Route::delete('/destroy/{post_ID}', [PostControllerResource::class, 'destroy'])->name('destroy');
        Route::get('/edit/{post_ID}', [PostControllerResource::class, 'edit'])->name('edit');
        Route::post('/edit/{post_ID}', [PostControllerResource::class, 'update'])->name('update');
    });
    Route::group(['prefix' => '/categories', 'as' => 'category.'], function () {
        Route::get('/',[CategoryControllerResource::class,'index'])->name('index');
        
        Route::get('/create', [CategoryControllerResource::class, 'create'])->name('create');
        Route::post('/create', [CategoryControllerResource::class, 'store'])->name('store');
        Route::delete('/destroy/{category_ID}', [CategoryControllerResource::class, 'destroy'])->name('destroy');
        Route::get('/edit/{category_ID}', [CategoryControllerResource::class, 'edit'])->name('edit');
        Route::put('/edit/{category_ID}', [CategoryControllerResource::class, 'update'])->name('update');
    
    });
    Route::group(['prefix'=> 'departments' , 'as' => 'department.'], function() {
        Route::get('/', [DepartmentControllerResource::class, 'index'])->name('index');
        Route::get('/create', [DepartmentControllerResource::class, 'create'])->name('create');
        Route::post('/create',[DepartmentControllerResource::class, 'store'])->name('store');
        Route::delete('/destroy/{department_ID}',[DepartmentControllerResource::class, 'destroy'])->name('destroy');
        Route::get('/edit/{department_ID}',[DepartmentControllerResource::class, 'edit'])->name('edit');
        Route::post('/update/{department_ID}',[DepartmentControllerResource::class, 'update'])->name('update');
    
    });
    Route::group(['prefix'=> 'lecturers' , 'as' => 'lecturer.'], function() {
        Route::get('/', [LecturerControllerResource::class, 'index'])->name('index');
        Route::get('/create', [LecturerControllerResource::class, 'create'])->name('create');
        Route::post('/create',[LecturerControllerResource::class, 'store'])->name('store');
        Route::delete('/destroy/{lecturer_ID}',[LecturerControllerResource::class, 'destroy'])->name('destroy');
        Route::get('/edit/{lecturer_ID}',[LecturerControllerResource::class, 'edit'])->name('edit');
        Route::post('/update/{lecturer_ID}',[LecturerControllerResource::class, 'update'])->name('update');
    
    });

});




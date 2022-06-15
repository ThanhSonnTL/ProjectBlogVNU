<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryControllerResource;
use App\Http\Controllers\LoginControllerResoucre;
use App\Http\Controllers\DepartmentControllerResource;
use App\Http\Controllers\PostControllerResource;
use App\Models\Blog;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/tintuc', function () {
//     return view('tintuc');
// });

Route::get('/', function () {
    return view('home');
});
Route::get('/admin', function () {
    return view('admin.home');
});

Route::resource('/category-manage', CategoryControllerResource::class);
Route::get('/edit/category-{id}',[CategoryControllerResource::class, 'edit']);
Route::post('/update/category-{id}',[CategoryControllerResource::class, 'update']);
Route::get('/delete/category-{id}',[CategoryControllerResource::class, 'delete']);

Route::group(['prefix'=> 'posts' , 'as' => 'post.'], function() {
    Route::get('/', [PostControllerResource::class, 'index'])->name('index');
    Route::get('/create', [PostControllerResource::class, 'create'])->name('create');
    Route::post('/create',[PostControllerResource::class, 'store'])->name('store');
    Route::delete('/destroy/{post_ID}',[PostControllerResource::class, 'destroy'])->name('destroy');
    Route::get('/edit/{post_ID}',[PostControllerResource::class, 'edit'])->name('edit');
    Route::post('/update/{post_ID}',[PostControllerResource::class, 'update'])->name('update');

});

Route::group(['prefix'=> 'departments' , 'as' => 'department.'], function() {
    Route::get('/', [DepartmentControllerResource::class, 'index'])->name('index');
    Route::get('/create', [DepartmentControllerResource::class, 'create'])->name('create');
    Route::post('/create',[DepartmentControllerResource::class, 'store'])->name('store');
    Route::delete('/destroy/{department_ID}',[DepartmentControllerResource::class, 'destroy'])->name('destroy');
    Route::get('/edit/{department_ID}',[DepartmentControllerResource::class, 'edit'])->name('edit');
    Route::post('/update/{department_ID}',[DepartmentControllerResource::class, 'update'])->name('update');

});


Route::get('/login',  [LoginControllerResoucre::class, 'auth_login']);
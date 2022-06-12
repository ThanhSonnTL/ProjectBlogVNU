<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryControllerResource;
use App\Http\Controllers\LoginControllerResoucre;
use App\Http\Controllers\DepartmentControllerResource;
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

Route::resource('/department-manage', DepartmentControllerResource::class);
Route::get('/department-manage', [DepartmentControllerResource::class, 'index']);
Route::get('/edit/department-{id}',[CategoryControllerResource::class, 'edit']);
Route::post('/update/department-{id}',[CategoryControllerResource::class, 'update']);
Route::get('/delete/department-{id}',[CategoryControllerResource::class, 'delete']);


Route::get('/login',  [LoginControllerResoucre::class, 'auth_login']);
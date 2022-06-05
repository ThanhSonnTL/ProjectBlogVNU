<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogControllerResource;
use App\Http\Controllers\LoginControllerResoucre;
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

Route::resource('/blog', BlogControllerResource::class);



Route::get('/login',  [LoginControllerResoucre::class, 'auth_login']);
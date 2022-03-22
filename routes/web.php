<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/blog/category/{slug?}','BlogControl@category')->name('category');
Route::get('/blog/article/{slug?}','BlogControl@article')->name('article');

Route::group(['prefix'=>'admin', 'namespace'=>'App\Http\Controllers\Admin','middleware'=>['auth']], function (){
    Route::get('/','DashboardController@dashboard')->name('admin.index');
    Route::resource('/category','CategoryController',['as'=>'admin']);
    Route::resource('/article','ArticleController',['as'=>'admin']);
    Route::group(['prefix'=>'user_managment','namespace'=>'user_managment'],function(){
Route::resource('/user','UserController',['as'=>'admin.user_managment']);
    });
});
Route::get('/', function () {
    return view('blog.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

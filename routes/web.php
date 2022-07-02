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

//Группа для роутов основных страниц сайта
Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController');
});

//Групп для роутов авторизированного юзера
Route::group(['namespace' => 'User'], function () {

});

//Группа для роутов админ панели
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    //Группа для основных страниц панели управления
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    //Группа для CRUD девушек
    Route::group(['namespace' => 'Girl', 'prefix' => 'girls'], function () {
        Route::get('/', 'IndexController')->name('admin.girls.index');
        Route::get('/create', 'CreateController')->name('admin.girls.create');
        Route::post('/', 'StoreController')->name('admin.girls.store');
    });

    //Группа для CRUD юзеров
    //Группа роутов для управления юзерами из админки
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.users.index');
        Route::get('/create', 'CreateController')->name('admin.users.create');
        Route::post('/', 'StoreController')->name('admin.users.store');
        Route::get('/{user}', 'ShowController')->name('admin.users.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.users.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.users.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.users.delete');
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

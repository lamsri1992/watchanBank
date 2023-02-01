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
Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});

Route::namespace('Auth')->group(function () {
	Route::post('login','LoginController@login')->name('login');
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('home','homeController@index')->name('home');

Route::group(['prefix' => 'member'], function () {
    Route::get('list','memberController@list')->name('member.list');
    Route::get('list/{id}','memberController@show')->name('member.show');
    Route::post('update/{id}','memberController@update')->name('member.update');
    Route::get('account','memberController@account')->name('member.account');
    Route::post('add','memberController@add')->name('member.add');
});

Route::group(['prefix' => 'account'], function () {
    Route::get('list','accountController@list')->name('account.list');
});

Route::group(['prefix' => 'item'], function () {
    Route::get('list','itemController@list')->name('item.list');
    Route::get('add','itemController@add')->name('item.add');
    Route::get('list/{id}','itemController@show')->name('item.show');
    Route::get('update/{id}','itemController@update')->name('item.update');
    Route::get('price','itemController@price')->name('item.price');
    Route::get('price/set/{id}','itemController@set_price')->name('price.set');
});

Route::group(['prefix' => 'transaction'], function () {
    Route::get('deposit','transactionController@deposit')->name('item.deposit');
    Route::get('deposit/add','transactionController@add_deposit')->name('tran.deposit');
    Route::get('withdraw','transactionController@withdraw')->name('tran.withdraw');
    Route::get('withdraw/{id}','transactionController@show_withdraw')->name('withdraw.show');
    Route::post('withdraw/approve/{id}','transactionController@approve_withdraw')->name('withdraw.approve');
});

Route::group(['prefix' => 'personal'], function () {
    Route::get('/','userController@index')->name('user.index');
    Route::get('statement','userController@statement')->name('user.statement');
    Route::get('withdraw','userController@withdraw')->name('user.withdraw');
});

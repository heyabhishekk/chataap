<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/','AdminController@welcome')->name('welcome');

Route::get('/registerview','AdminController@registerview')->name('registerview');
Route::post('/registerstore','AdminController@registerstore')->name('registerstore');

Route::get('loginview','AdminController@loginview')->name('loginview');
Route::post('/loginstore','AdminController@loginstore')->name('loginstore');

Route::get('/dashboard','AdminController@dashboard')->name('dashboard');

Route::get('/logout','AdminController@logout')->name('logout');

Route::get('/users','AdminController@users')->name('users');

Route::get('/chats/{userId}', 'AdminController@startChats')->name('chats');

Route::post('/send-message', 'AdminController@sendMessage')->name('send-message');

Route::get('/get-messages', 'AdminController@getMessages')->name('get-messages');

Route::get('/account/delete', 'AdminController@delete')->name('account.delete');




<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Ad as Ad;
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

Route::get('/', 'App\Http\Controllers\AdController@index');
Route::get('/ad/{id}', function ($id) {
    $ad = DB::table('ads')->where('id', $id)->first();
    $isAuthor = false;
    $user_id = Auth::id();
    if($user_id == $ad->author_id) $isAuthor = true;
    return view('single', [
        'ad' => $ad,
        'isAuthor' => $isAuthor
    ]);
});
Route::get('/newad', function () {
    return view('newad');
})->name('newad');
Route::get('/editad/{id}', 'App\Http\Controllers\AdController@edit')->name('editad');

Auth::routes();

Route::post('/ad', 'App\Http\Controllers\AdController@store');
Route::post('/editad/{id}', 'App\Http\Controllers\AdController@update');

Route::get('/home', function () {
    return redirect('/');
});
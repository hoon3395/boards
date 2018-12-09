<?php

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
Route::get('/', 'MainPageController@show');
Route::get('/home', 'MainPageController@show');

// Route::get('/', function () {
//     return view('layouts.app');
// });


Auth::routes(); // 로그인 로그아웃 레지스터 기능 한번에 제공해줌 


// Route::any('/homePage','homePage');

Route::any('/main', 'GameController@store');

Route::resource('boards','BoardsController'); //boards로 시작하는 url은 BoardsController로

Route::resource('game','GameController');

Route::get('myArticles', 'BoardsController@myArticles');

Route::resource('attachments','AttachmentsController')->only(['store','destroy']);
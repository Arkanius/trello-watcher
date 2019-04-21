<?php
use GuzzleHttp\Client;

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

Route::get('/', function () {
    $key = env('TRELLO_KEY');
    $token = env('TRELLO_TOKEN');
    $board = env('TRELLO_BOARD');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

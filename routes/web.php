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
//    return view('welcome');

    $key = env('TRELLO_KEY');
    $token = env('TRELLO_TOKEN');
    $board = '5a8c25ea560c1c1ca1347546';

    $client = new GuzzleHttp\Client(['base_uri' => 'https://api.trello.com']);
// Send a request to https://foo.com/api/test
    $response = $client->request('GET', "1/boards/$board/lists?key=$key&token=$token");
    dd($response->getBody()->getContents());
});

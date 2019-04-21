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
    $action = 'cards';
    $action = 'actions'; //$content->date

    $client = new GuzzleHttp\Client(['base_uri' => 'https://api.trello.com']);
    $response = $client->request('GET', "1/boards/$board/$action?key=$key&token=$token");

    foreach (json_decode($response->getBody()->getContents()) as $content) {
        dd($content);
        dd($content->id, $content->name, $content->shortUrl, $content->labels,
            $content->idList);
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

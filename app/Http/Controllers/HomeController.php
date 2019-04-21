<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        $board = $user->config['trello_board'];
        $token = $user->config['trello_token'];
        $key = $user->config['trello_key'];

        $action = 'cards';
        $action = 'actions'; //$content->date

        $client = new Client(['base_uri' => 'https://api.trello.com']);
        $response = $client->request('GET', "1/boards/$board/$action?key=$key&token=$token");

        foreach (json_decode($response->getBody()->getContents()) as $content) {
            dd($content);
            dd($content->id, $content->name, $content->shortUrl, $content->labels,
                $content->idList);
        }
        return view('home');
    }
}

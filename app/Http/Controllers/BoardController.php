<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(Request $request)
    {
        $token = env('TRELLO_TOKEN');
        $key = env('TRELLO_KEY');

        $client = new Client(['base_uri' => 'https://api.trello.com']);
        $response = $client->request('GET', "1/members/me/boards?key=$key&token=$token");

        $result = array_reduce(json_decode($response->getBody()->getContents()), function ($boards, $board) {
            array_push($boards, [
                'name' => $board->name,
                'id' => $board->id
            ]);

            return $boards;
        }, []);

        return response()->json(
            $result
        );
    }
}

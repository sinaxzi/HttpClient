<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleReq;
use GuzzleHttp\Psr7\Response as GuzzleRes;
use Illuminate\Http\Response;

class UserGuzzleController extends Controller
{

    public function index(Request $request): Response
    {
        $client = new Client(['base_uri' => 'https://jsonplaceholder.typicode.com/']);

        $response = $client->request('GET', 'users');



//        dd(json_decode($response->getBody()->getContents()));

        return response($response->getBody()->getContents(), 200,[
            'content-type' => 'application/json'
        ]);

    }

    public function store(Request $request)
    {
        $client = new Client(['base_uri' => 'https://jsonplaceholder.typicode.com/']);

        $response = $client->request('POST','users', [
            'json' => $request->all()
        ]);

        return response($response->getBody()->getContents(), 200,[
            'content-type' => 'application/json'
        ]);
    }

    public function update(Request $request, $id)
    {
        $client = new Client(['base_uri' => 'https://jsonplaceholder.typicode.com/']);

        $response = $client->request('PUT',"users/$id", [
            'json' => $request->all()
        ]);

        return response($response->getBody()->getContents(), 200,[
            'content-type' => 'application/json'
        ]);
    }

    public function destroy($id)
    {
        $client = new Client(['base_uri' => 'https://jsonplaceholder.typicode.com/']);

        $response = $client->request('DELETE',"users/$id");

        return response($response->getBody()->getContents(), 200,[
            'content-type' => 'application/json'
        ]);
    }
}

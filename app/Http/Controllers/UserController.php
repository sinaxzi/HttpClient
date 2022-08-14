<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index(Request $request): Response
    {
        $users = Http::get('https://jsonplaceholder.typicode.com/users');

        return response($users->json(), 200);
    }

    public function store(Request $request): Response
    {
        $httpResponse = Http::post('https://jsonplaceholder.typicode.com/users', $request->all());

        return response($httpResponse->json(), 200);
    }

    public function update(Request $request, $id): Response
    {
        $user = Http::put("https://jsonplaceholder.typicode.com/users/$id", $request->all());

        return response($user->json(), 200);
    }

    public function destroy($id): Response
    {
        $user = Http::delete("https://jsonplaceholder.typicode.com/users/$id");

        return response($user->json(), 200);
    }
}

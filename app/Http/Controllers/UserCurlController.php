<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserCurlController extends Controller
{

    public function index()
    {
        $curl = curl_init();

        curl_setopt_array($curl,array(
            CURLOPT_URL => 'https://jsonplaceholder.typicode.com/users',
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return response(json_decode($response,true),200,[
            'content-type' => 'application/json'
        ]);
    }

    public function store(Request $request):Response
    {


        $curl = curl_init();

        curl_setopt_array($curl,array(
            CURLOPT_URL => 'https://jsonplaceholder.typicode.com/users',
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => json_encode($request->all()),
            CURLOPT_HTTPHEADER => array(
                'content-type: application/json',
            ),
        ));

        $response = curl_exec($curl);

        return response(json_decode($response,true),200,[
            'content-type' => 'application/json'
        ]);
    }

    public function update(Request $request, $id)
    {
        $curl = curl_init();

        curl_setopt_array($curl,array(
            CURLOPT_URL => "https://jsonplaceholder.typicode.com/users/$id",
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => json_encode($request->all()),
            CURLOPT_HTTPHEADER => array(
                'content-type: application/json'
            ),

        ));

        $response = curl_exec($curl);


        return response(json_decode($response,true),200,[
            'content-type' => 'application/json'
        ]);
    }

    public function destroy($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl,array(
            CURLOPT_URL => "https://jsonplaceholder.typicode.com/users/$id",
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_RETURNTRANSFER => true,

        ));

        $response = curl_exec($curl);


        return response(json_decode($response,true),200);
    }
}

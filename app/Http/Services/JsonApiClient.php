<?php

namespace App\Http\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class JsonApiClient
{
    /**
     * @throws Exception
     */
    public function getUsers()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');

        if ($response->failed()) {
            throw new Exception('Failed to retrieve users');
        }

        return $response->json();
    }

    public function getPosts()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        if ($response->failed()) {
            throw new Exception('Failed to retrieve users');
        }

        return $response->json();
    }
}
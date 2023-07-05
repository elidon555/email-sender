<?php

namespace App\Repositories;

use App\Http\Services\JsonApiClient;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class PostRepository extends BaseRepository
{
    /**
     * @var JsonApiClient
     */
    private JsonApiClient $jsonApiClient;

    /**
     * @param Post $model
     * @param JsonApiClient $jsonApiClient
     */
    public function __construct(Post $model, JsonApiClient $jsonApiClient)
    {
        parent::__construct($model);
        $this->jsonApiClient = $jsonApiClient;
    }

    /**
     * @return Collection
     * @throws Exception
     */
    public function getPosts(): Collection
    {
        $data = $this->jsonApiClient->getPosts();

        $users = array_map(function ($item) {
            return new Post($item);
        }, $data);

        return collect($users);
    }
}
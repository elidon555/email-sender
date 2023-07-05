<?php

namespace App\Repositories;

use App\Http\Services\JsonApiClient;
use App\Models\User;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class UserRepository extends BaseRepository
{
    private JsonApiClient $jsonApiClient;

    /**
     * @param User $model
     * @param JsonApiClient $jsonApiClient
     */
    public function __construct(User $model, JsonApiClient $jsonApiClient)
    {
        parent::__construct($model);
        $this->jsonApiClient = $jsonApiClient;
    }

    /**
     * @return Collection
     * @throws Exception
     */
    public function getUsers(): Collection
    {
        $data = $this->jsonApiClient->getUsers();

        $users = array_map(function ($item) {
            return new User($item);
        }, $data);

        return collect($users);
    }

    /**
     * @param Collection $users
     * @param Collection $posts
     * @return void
     */
    public function setRelationships(Collection &$users,Collection $posts): void
    {
        foreach ($users as $user) {
            $filteredPosts = $posts->filter(function ($post) use ($user) {
                return $post->userId == $user->id;
            })->take(3);
            $user->setRelation('posts', collect($filteredPosts));
        }
    }
}
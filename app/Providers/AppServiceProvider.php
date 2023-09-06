<?php

namespace App\Providers;

use App\Http\Services\JsonApiClient;
use App\Models\Post;
use App\Models\User;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class, function ($app) {
            return new UserRepository(new User, $app->make(JsonApiClient::class));
        });
        $this->app->bind(PostRepository::class, function ($app) {
            return new PostRepository(new Post, $app->make(JsonApiClient::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }

}

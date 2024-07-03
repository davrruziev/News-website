<?php

namespace App\Providers;

use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\TagRepository;
use Illuminate\Support\ServiceProvider;

class TagRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application Services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application Services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        view()->composer('layouts.site', function ($view) {
            $categories = Category::all();
            $response = Http::get('https://cbu.uz/oz/arkhiv-kursov-valyut/json/');
            $requestData = $response->json();
            $kursdata['usd'] = $requestData[0]['Rate'];
            $kursdata['euro'] = $requestData[1]['Rate'];
            $kursdata['rub'] = $requestData[2]['Rate'];
            $view->with(compact('categories', 'kursdata'));
        });
        view()->composer('sections.popularPosts', function ($view) {
            $popularPosts = Post::limit(4)->orderBy('view', 'desc')->get();
            $view->with(compact('popularPosts'));
        });
    }
}

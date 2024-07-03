<?php

namespace App\Http\Controllers;

use App\Mail\Message;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\SendMailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public $postRepository;
    public $categoryRepository;
    public $sendMail;

    public function __construct(
        PostRepositoryInterface     $postRepository,
        CategoryRepositoryInterface $categoryRepository,
        SendMailService             $sendMail
    )
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->sendMail = $sendMail;

    }

    public function index()
    {
        $specialPost = $this->postRepository->specialPost();
        $latestPosts = $this->postRepository->latestPosts();
        return view('index', compact('specialPost', 'latestPosts'));
    }

    public function categoryPost($slug)
    {
        $category = $this->categoryRepository->categorySlug($slug);
        $posts = $this->categoryRepository->categoryPost($category, 3);
        return view('categoryPost', compact('category', 'posts'));
    }

    public function postDetail($slug)
    {
        $post = $this->postRepository->slugPosts($slug);
        $otherPosts = $this->postRepository->othersPosts($post);
        return view('postDetail', compact('post', 'otherPosts'));

    }

    public function contact()
    {
        return view('contact');
    }

    public function sendMail(Request $request)
    {
        $data = $this->sendMail->sendMail($request);
        Mail::to('davrruziev77@gmail.com')->send(new Message($data));
        return back()->with('message', 'Malumot yuborildi');
    }

    public function search(Request $request)
    {
        $key = $request->key;
        $posts = $this->postRepository->searchAll($key);
        return view("search", compact('posts', 'key'));

    }

}

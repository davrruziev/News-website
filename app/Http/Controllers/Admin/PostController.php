<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $postService;
    public $postRepository;
    public $categoryRepository;
    public $tagRepository;

    public function __construct(
        PostService                 $postService, PostRepositoryInterface $postRepository,
        CategoryRepositoryInterface $categoryRepository,
        TagRepositoryInterface      $tagRepository
    )
    {
        $this->postService = $postService;
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getAll();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        $tags = $this->tagRepository->getAll();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(StorePostRequest $request)
    {
        $this->postService->store($request);
        return redirect()->route('admin.post.index')->with('success', 'Posts created succesfully!');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = $this->categoryRepository->getAll();
        $tags = $this->tagRepository->getAll();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $this->postService->update($request, $post);
        return redirect()->route('admin.post.index')->with('success', 'Posts update succesfully!');
    }

    public function destroy($id)
    {
        $this->postRepository->getDestroy($id);
        return redirect()->route('admin.post.index')->with('success', 'Posts delete succesfully!');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = time() . '-' . $request->file('upload')->getClientOriginalName();
            $request->file('upload')->move('site/images/posts', $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('site/images/posts/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}

<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{

    public function getAll()
    {
        return Post::all();
    }

    public function getDestroy($id)
    {
       return Post::destroy($id);
    }

    public function specialPost()
    {
        $post =  Post::WHERE('is_special', 1)->limit(6)->latest()->get();
        return $post;
    }

    public function latestPosts()
    {
       $post =  Post::limit(6)->latest()->get();
       return $post;
    }

    public function slugPosts($slug)
    {
       $post = Post::where('slug',$slug)->first();
        $post->increment('view');
        $post->save();
       return $post;
    }

    public function othersPosts($post)
    {
       $post =  Post::where('category_id',$post->category_id)->where('id', '!=', $post->id)->limit(3)->latest()->get();
       return $post;
    }

    public function searchAll($key)
    {
       $post = Post::where('title_uz', 'like', '%'.$key.'%')
            ->orwhere('title_ru','like','%'.$key.'%')
            ->orwhere('body_ru','like','%'.$key.'%')
            ->orwhere('body_uz','like','%'.$key.'%')
            ->paginate(5);
       return $post;
    }

}

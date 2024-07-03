<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;

class PostService
{
    public function store($request)
    {

        $requestData=$request->all();
       $requestData['img'] = $this->fileUpload($request->file('img'));
        $post = Post::create($requestData);
        $post->tags()->attach($request->tags);
        return $post;
    }

    public function update($request,$post)
    {
        $requestData=$request->all();
        $requestData['is_special']= $request->is_special ?? 0;
       $requestData['img'] = $this->fileUpload($request->file('img'));
        $post->update($requestData);
        $post->tags()->sync($request->tags);
        return $post;
    }



    public function fileUpload($file)
    {

        if(isset($file)){
            $imageName=$file->getClientOriginalName();
            $file->move('site/images/posts',$imageName);
            return $imageName;
        }

    }
}

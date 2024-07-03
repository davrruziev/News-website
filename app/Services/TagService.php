<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    public function store($request)
    {
        $requestData=$request->all();
        $requestData['slug']=\Str::slug($request->name_uz);

        $tag = Tag::create($requestData);
        return $tag;
    }

    public function update($request,$tag)
    {
        $requestData=$request->all();

        $requestData['slug']=\Str::slug($request->name_uz);
        $tag->update($requestData);
        return $tag;
    }
}

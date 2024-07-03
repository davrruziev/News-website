<?php
namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function store($request)
    {
        $requestData = $request->all();

        $requestData['slug'] = \Str::slug($requestData['name_uz']);
        $category = Category::create($requestData);
        return $category;
    }

    public function update($request, $category)
    {
        $requestData = $request->all();
        $requestData['slug'] = \Str::slug($requestData['name_uz']);
        $category->update($requestData);
        return $category;

    }
}

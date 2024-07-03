<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return CategoryResource::collection(Category::all());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate( $request, [
            'name_uz' => 'required',
            'name_ru' => 'required',
        ]);
        $requestDate = $request->all();
        $requestDate['slug'] = \Str::slug($requestDate['name_uz']);
        $category = Category::create($requestDate);
        return $category;

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name_uz' => 'required',
            'name_ru' => 'required',
        ]);

        $requestDate = $request->all();
        $requestDate['slug'] = \Str::slug($requestDate['name_uz']);
       $category->update($requestDate);
       return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return "ok";
    }
}

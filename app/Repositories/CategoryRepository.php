<?php
namespace App\Repositories;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll()
    {
         return Category::all();
    }

    public function getPaginate($page)
    {
         return Category::paginate($page);
    }

    public function getDestroy($id)
    {
       return $id->delete();
    }

    public function categorySlug($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return $category;
    }

    public function categoryPost($category,$page)
    {
        $post = $category->posts()->paginate($page);
        return $post;
    }
}

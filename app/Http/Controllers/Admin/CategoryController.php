<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public $categoryService;

    public $categoryRepository;

    public function __construct(
        CategoryService             $categoryService,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getPaginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->categoryService->store($request);
        return redirect()->route('admin.category.index')->with('message', 'Category added!');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->categoryService->update($request, $category);
        return redirect()->route('admin.category.index')->with('message', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $this->categoryRepository->getDestroy($category);
        return redirect()->route('admin.category.index')->with('message', 'Category deleted successfully!');
    }
}

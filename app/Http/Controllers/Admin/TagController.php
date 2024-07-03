<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Services\TagService;

class TagController extends Controller
{
    public $tagService;
    public $tagRepository;

    public function __construct(
        TagService             $tagService,
        TagRepositoryInterface $tagRepository
    )
    {
        $this->tagService = $tagService;
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        $tags = $this->tagRepository->getAll();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(StoreTagRequest $request)
    {
        $this->tagService->store($request);
        return redirect()->route('admin.tag.index')->with('success', 'Tag created succesfully!');
    }

    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $this->tagService->update($request, $tag);
        return redirect()->route('admin.tag.index')->with('success', 'Tag update succesfully!');
    }

    public function destroy(Tag $tag)
    {
        $this->tagRepository->getDestroy($tag);
        return redirect()->route('admin.tag.index')->with('success', 'Tag delete successfully!');
    }
}

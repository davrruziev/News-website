<?php
namespace App\Repositories;
use App\Models\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;

class TagRepository implements TagRepositoryInterface
{
    public function getAll()
    {
        return Tag::all();
    }

    public function getDestroy($id)
    {
        return $id->delete();
    }
}

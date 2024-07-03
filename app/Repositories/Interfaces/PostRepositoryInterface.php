<?php
namespace App\Repositories\Interfaces;

use App\Models\Post;

interface PostRepositoryInterface
{
    public function getAll();

    public function getDestroy($id);

    public function specialPost();

    public function latestPosts ();

    public function slugPosts ($slug);

    public function othersPosts($post);

    public function searchAll($key);
}

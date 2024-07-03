<?php
namespace App\Repositories\Interfaces;

interface CategoryRepositoryInterface
{
    public function getAll();
    public function getPaginate($page);

    public function getDestroy($id);

    public function categorySlug($slug);

    public function categoryPost($category,$page);
}

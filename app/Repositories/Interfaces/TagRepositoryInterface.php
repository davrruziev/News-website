<?php
namespace App\Repositories\Interfaces;

interface TagRepositoryInterface
{
    public function getAll();
    public function getDestroy($id);
}

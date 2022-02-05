<?php
namespace App\Repository;

use Illuminate\Support\Collection;

interface PostCommentRepositoryInterface
{
    public function all(): Collection;
}

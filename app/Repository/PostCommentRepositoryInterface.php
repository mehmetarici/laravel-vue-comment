<?php
namespace App\Repository;

use App\Models\Comment;
use Illuminate\Support\Collection;

interface PostCommentRepositoryInterface
{
    public function all(): Collection;

    public function createComment(array $attributes): Comment;
}

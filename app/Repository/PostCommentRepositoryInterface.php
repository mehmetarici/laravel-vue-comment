<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface PostCommentRepositoryInterface
{
    public function all(): Collection;

    public function createComment(array $attributes): Model;
}

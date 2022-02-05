<?php

namespace App\Repository\Eloquent;

use App\Models\Comment;
use App\Repository\PostCommentRepositoryInterface;
use Illuminate\Support\Collection;

class PostCommentRepository extends BaseRepository implements PostCommentRepositoryInterface
{

    /**
     * PostCommentRepository constructor.
     *
     * @param Comment $model
     */
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     * TODO for now postId not important, after implemented Post,
     * TODO you can select only specified post comments
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}

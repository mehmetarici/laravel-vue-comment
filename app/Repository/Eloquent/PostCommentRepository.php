<?php

namespace App\Repository\Eloquent;

use App\Models\PostComment;
use App\Repository\PostCommentRepositoryInterface;
use Illuminate\Support\Collection;

class PostCommentRepository extends BaseRepository implements PostCommentRepositoryInterface
{

    /**
     * PostCommentRepository constructor.
     *
     * @param PostComment $model
     */
    public function __construct(PostComment $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}

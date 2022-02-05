<?php

namespace App\Repository\Eloquent;

use App\Models\Comment;
use App\Repository\PostCommentRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        return $this->model
            ->whereNull('parent_id')
            ->orderBy("created_at", "DESC")
            ->with(['replies' => function ($query) {
                $query->with("replies");
            }])
            ->get();
    }

    /**
     * @param array $attributes
     * @return Comment
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function createComment(array $attributes): Comment
    {
        DB::beginTransaction();
        try {
            $result = $this->create($attributes);
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500, $exception);
        }
        DB::commit();
        return $result;
    }
}

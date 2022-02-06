<?php

namespace App\Repository\Eloquent;

use App\Models\Comment;
use App\Repository\PostCommentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostCommentRepository extends BaseRepository implements PostCommentRepositoryInterface
{

    private static $CACHE_COMMENT_KEY = "comments";

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
     *
     * with caching, queried result will be cached and will not query to DB again
     */
    public function all(): Collection
    {
        if (Cache::has(self::$CACHE_COMMENT_KEY)) {
            return Cache::get(self::$CACHE_COMMENT_KEY);
        } else
            return Cache::rememberForever(self::$CACHE_COMMENT_KEY, function () {
                return $this->model
                    ->whereNull('parent_id')
                    ->orderBy("created_at", "DESC")
                    ->with(['replies' => function ($query) {
                        $query->orderBy("created_at", "DESC")->with("replies");
                    }])
                    ->get();
            });
    }

    /**
     * @param array $attributes
     * @return Model
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function createComment(array $attributes): Model
    {
        DB::beginTransaction();
        try {
            $result = $this->create($attributes);
            Cache::flush();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500, $exception);
        }
        DB::commit();
        return $result;
    }
}

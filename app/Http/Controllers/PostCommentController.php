<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Repository\PostCommentRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostCommentController extends Controller
{
    private $postCommentRepository;

    public function __construct(PostCommentRepositoryInterface $postCommentRepository)
    {
        $this->postCommentRepository = $postCommentRepository;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function listComments(): AnonymousResourceCollection
    {
        $result = $this->postCommentRepository->all();
        return CommentResource::collection($result);
    }

    /**
     * @param CreateCommentRequest $request
     * @return CommentResource
     */
    public function createComment(CreateCommentRequest $request): CommentResource
    {

        $validatedRequest = $request->validated();

        $comment = $this->postCommentRepository->createComment($validatedRequest);
        return new CommentResource($comment);
    }
}

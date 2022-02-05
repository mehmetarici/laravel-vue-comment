<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Repository\PostCommentRepositoryInterface;

class PostCommentController extends Controller
{
    private $postCommentRepository;

    public function __construct(PostCommentRepositoryInterface $postCommentRepository)
    {
        $this->postCommentRepository = $postCommentRepository;
    }

    public function listComments()
    {
        $comments = $this->postCommentRepository->all();
        return CommentResource::collection($comments);
    }

    public function createComment(CreateCommentRequest $request)
    {

        $data = $request->validated();

        $comment = $this->postCommentRepository->create($data);
        return new CommentResource($comment);
    }
}

<?php

namespace App\Http\Controllers;

use App\Repository\PostCommentRepositoryInterface;

class PostCommentController extends Controller
{
    private $postCommentRepository;

    public function __construct(PostCommentRepositoryInterface $postCommentRepository)
    {
        $this->postCommentRepository = $postCommentRepository;
    }

    public function getComments()
    {
        // TODO just for testing
        $comments = $this->postCommentRepository->all();

        return response([
            'users' => $comments
        ]);
    }
}

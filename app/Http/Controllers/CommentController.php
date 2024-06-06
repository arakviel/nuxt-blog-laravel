<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    public function index(Post $post): JsonResponse
    {
        $comments = $post->comments;
        return response()->json($comments);
    }

    public function store(StoreCommentRequest $request, Post $post): JsonResponse
    {
        $comment = $post->comments()->create($request->validated() + ['user_id' => auth()->id()]);
        return response()->json($comment, 201);
    }

    public function show(Post $post, Comment $comment): JsonResponse
    {
        return response()->json($comment);
    }

    public function update(UpdateCommentRequest $request, Post $post, Comment $comment): JsonResponse
    {
        $comment->update($request->validated());
        return response()->json($comment);
    }

    public function destroy(Post $post, Comment $comment): JsonResponse
    {
        $comment->delete();
        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Comment\StoreCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($taskId)
    {
        $comments = Task::findOrFail($taskId)->comments;
        return CommentResource::collection($comments);
    }

    public function store(StoreCommentRequest $request, $taskId)
    {
        $task = Task::findOrFail($taskId);

        $comment = $task->comments()->create([
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return new CommentResource($comment);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return response()->json(null, 204);
    }
}

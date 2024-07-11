<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Task\StoreTaskRequest;
use App\Http\Requests\Api\Task\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Auth::user()->tasks;
        return TaskResource::collection($tasks);
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Auth::user()->tasks()->create($request->validated());
        return new TaskResource($task);
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return new TaskResource($task);
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->validated());
        return new TaskResource($task);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }
}

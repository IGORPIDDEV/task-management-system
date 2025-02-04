<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'content' => $this->faker->paragraph(),
            'task_id' => \App\Models\Task::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}


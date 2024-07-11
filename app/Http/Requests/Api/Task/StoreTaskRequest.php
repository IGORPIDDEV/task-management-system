<?php

namespace App\Http\Requests\Api\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:pending,in_progress,completed',
            'team_id' => 'nullable|exists:teams,id',
        ];
    }
}

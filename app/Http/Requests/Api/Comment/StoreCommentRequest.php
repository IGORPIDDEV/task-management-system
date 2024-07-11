<?php

namespace App\Http\Requests\Api\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'content' => 'required|string',
        ];
    }
}

<?php

namespace App\Http\Requests\Api\Team;

use Illuminate\Foundation\Http\FormRequest;

class AddUserToTeamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
        ];
    }
}

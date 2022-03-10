<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return request()->user()->tokenCan('post:create');
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:App\Models\User,id',
            'title' => 'required|string',
            'content' => 'required|string',
        ];
    }
}

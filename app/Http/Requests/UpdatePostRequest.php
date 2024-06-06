<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:128',
            'slug' => 'required|string|max:128|unique:posts,slug,' . $this->route('post')->id,
            'description' => 'nullable|string|max:278',
            'image' => 'nullable|image',
            'body' => 'required|string',
            'published_at' => 'nullable|date',
        ];
    }
}

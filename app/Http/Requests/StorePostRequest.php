<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:128',
            'slug' => 'required|string|max:128|unique:posts,slug',
            'description' => 'nullable|string|max:278',
            'image' => 'nullable|image',
            'body' => 'required|string',
            'published_at' => 'nullable|date',
        ];
    }
}

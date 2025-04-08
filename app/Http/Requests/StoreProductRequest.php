<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // TODO add authorization
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'price' => 'required|numeric|min:1',
            'category' => 'required|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp'
        ];
    }
}

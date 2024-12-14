<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'title' => ['string', 'required', 'max:255'],
            'content' => ['string', 'required'],
            'image' => ['image', 'nullable', 'mimes:png,jpg,jpeg', 'max:2048'],
            'sub_category' => ['string', 'nullable'],
            'isComment' => ['required'],
            'isShare' => ['required'],
            'isActive' => ['required'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'tags' => ['string', 'nullable']


        ];
    }
}

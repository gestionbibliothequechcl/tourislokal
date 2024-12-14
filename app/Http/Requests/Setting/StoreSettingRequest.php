<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingRequest extends FormRequest
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
            'name'=> ['string', 'required'],
            'logo'=> ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:value'],
            'adress'=>['string', 'nullable'],
            'phone'=>['string', 'nullable'],
            'email'=> ['string','nullable'],
            'about'=>['string','nullable']
        ];
    }
}

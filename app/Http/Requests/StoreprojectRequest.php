<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreprojectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cover_image'=>['nullable', 'image'],
            'image'=>['nullable'],
            'image.*'=>['image'],
            'type'=>['required'],
            'title'=>['required'],
            'location'=>['required'],
            'subtitle'=>['nullable', 'string'],
            'category'=>['nullable', 'string', 'max:255'],
            'year'=>['nullable', 'digits:4'],
            'description'=>['nullable', 'string'],
        ];
    }
}

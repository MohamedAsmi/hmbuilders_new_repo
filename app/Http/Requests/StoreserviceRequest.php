<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreserviceRequest extends FormRequest
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
            'image'=>['required'],
            'icon'=>['nullable', 'required_without:icon_image', 'string', 'max:255'],
            'icon_image'=>['nullable', 'required_without:icon', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp'],
            'title'=>['required'],
            'description'=>['required'],
            'features'=>['nullable', 'string'],
        ];
    }
}

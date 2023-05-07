<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
        "name" => 'required|string|max:100',
        "description" => 'required|max:1000',
        "short_description" => 'nullable|max:500',
        "slug" => 'required|unique:products,slug',
        "categories" => 'array|min:1',
        "categories.*" => 'numeric|exists:categories,id',
        "tags" => 'nullable',
        "brand_id" => 'required|exists:brands,id',

        ];
    }



    public function messages()
    {
        return [
            "brand_name.required"  => "brand name is required",
            "photo.requird_without:id" => "photo is required"
         ];
    }
}


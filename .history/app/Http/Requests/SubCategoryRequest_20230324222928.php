<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        "category_name" => 'required|string',
        "slug" => "required|unique:categories,slug,".$this->id,
        "parent_id" => "exists:categories,parent_id"
        ];
    }



    public function messages()
    {
        return [
            "category_name.required"  => __('messages.category_name_required'),
            "slug.requird" => __('messages.slug_required')
         ];
    }
}

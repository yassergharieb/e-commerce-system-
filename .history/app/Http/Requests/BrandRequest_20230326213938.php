<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        "brand_name" => 'required|string',
        "photo" => 'required|mimes:png,jpg',
        ];
    }



//     public function messages()
//     {
//         return [
//             "brand_name.required"  => __('messages.category_name_required'),
//             "slug.requird" => __('messages.slug_required')
//          ];
//     }
// }
}

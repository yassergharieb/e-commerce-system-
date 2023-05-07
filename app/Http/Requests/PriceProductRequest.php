<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceProductRequest extends FormRequest
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
        "price" => 'required|numeric|min:0',
        "product_id" => 'numeric|required|exists:products,id', 
        "special_price" => "nullable|numeric", 


        "special_price_type" => 'required_with:special_price|in:fixed, percent',
       
        "special_price_start" => 'required_with:special_price|date_format:Y-m-d',
        "special_price_end" => 'required_with:special_price|date_format:Y-m-d',
      


        ];
    }



    public function messages()
    {
        return [

         ];
    }
}

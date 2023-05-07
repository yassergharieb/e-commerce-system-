<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\ProductQty;

class StockDetailsProductRequest extends FormRequest
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
        "product_id" => 'required|numeric|exists:products,id',
        "sku" => 'required|max:10|min:5',
        "manage_stock" => 'required|in:0,1',
        "in_stock" => 'required|in:0,1',
        "qty" =>  [new ProductQty($this->manage_stock)]





        ];
    }



    public function messages()
    {
        return [

         ];
    }
}


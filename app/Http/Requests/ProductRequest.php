<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "name" => "required",
            "brand_id" => "required|exists:brands,id",
            "is_active" => "required|in:1,0",
            "tag_ids" => "required",
            "tag_ids.*" => "exists:tags,id",
            "description" => "required|min:5",
            "category_id" => "required|exists:categories,id",
            "filter" => "required",
            "filterid.*" => "required",
            "variation.*" => "required",
            "variationid" => "required|exists:attributes,id",
            "delivery_amount" => "required",
            "delivery_amount_per_product" => "required",
            "primary_image" => "required|mimes:jpg,jpeg,png",
            "images.*" => "required|mimes:jpg,jpeg,png"
        ];
    }
}



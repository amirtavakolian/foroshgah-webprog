<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
            "name" => "required|",
            "slug" => "required|",
            "parent_id" => "nullable",
            "is_active" => "required|in:1,2",
            "attribute_ids.*" => "required|exists:attributes,id",
            "attribute_is_filter_ids.*" => "required|exists:attributes,id",
            "variation_id.*" => "required|exists:attributes,id",
            "icon" => "nullable",
            "description" => "required",
        ];
    }
}



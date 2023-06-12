<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'string',
            'price' => 'string',
            'description' => 'string',
            'characteristics' => 'string',
            'color_id' => 'integer',
            'size_id' => 'integer',
            'category_id' => 'integer',
            'image' => 'file'
        ];
    }
}

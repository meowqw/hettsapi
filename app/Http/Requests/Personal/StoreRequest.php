<?php

namespace App\Http\Requests\Personal;

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
            'surname' => 'string',
            'name' => 'string',
            'middle_name' => 'string',
            'phone' => 'string',
            'email' => 'string',
            'city' => 'string',
            'region' => 'string',
            'country' => 'string',
            'delivery_company' => 'string',
            'type_shop' => 'string',
            'user_id' => 'integer'
        ];
    }
}

<?php

namespace App\Http\Requests\Legal;

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
            'company_name' => 'string',
            'company_address' => 'string',
            'ogrn' => 'string',
            'inn' => 'string',
            'kpp' => 'string',
            'payment_account' => 'string',
            'correspondent_account' => 'string',
            'bic' => 'string',
            'ceo' => 'string',
            'bank' => 'string',
            'user_id' => 'integer'
        ];
    }
}

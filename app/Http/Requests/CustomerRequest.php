<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
            'item.name' => 'required',
            'item.tel' => [
                'required',
                'numeric',
                Rule::unique('customers', 'tel')->ignore($this->input('item.id'))
            ],
            'item.address' => 'required',
            'item.copy' => 'required | numeric',
        ];
    }

    public function attributes()
    {
        return [
            'item.name' => '名前',
            'item.tel' => '電話番号',
            'item.address' => '住所',
            'item.copy' => '部数',
        ];
    }
}

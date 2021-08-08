<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
     * バリデーション失敗時の処理を上書き
     *
     * @param Validator $validator
     * @throw HttpResponseException
     * @see FormRequest::failedValidation()
     */
    protected function failedValidation(Validator $validator)
    {
        $response['data']    = [];
        $response['status']  = 'NG';
        $response['summary'] = 'Failed validation.';
        $response['errors']  = $validator->errors()->toArray();

        throw new HttpResponseException(
            response()->json($response, 422)
        );
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
            'item.email' => ['required', 'email', Rule::unique('users', 'email')],
            'item.phone' => ['required', 'numeric', Rule::unique('users', 'phone')->ignore($this->input('item.id'))],
            'item.password' => 'required | confirmed',
        ];
    }

    public function attributes()
    {
        return [
            'item.name' => '名前',
            'item.email' => 'メールアドレス',
            'item.phone' => '携帯電話番号',
            'item.password' => 'パスワード',
        ];
    }
}

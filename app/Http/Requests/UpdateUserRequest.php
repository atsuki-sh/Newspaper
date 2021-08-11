<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $rules = [
            'item.name' => 'required',
            'item.email' => ['required',
                'email',
                Rule::unique('users', 'email')->ignore($this->input('item.id'))
            ],
            'item.phone' => [
                'required',
                'numeric',
                'digits: 11',
                Rule::unique('users', 'phone')->ignore($this->input('item.id'))
            ],
        ];

        // パスワードを変更するなら、下のルールを追加
        if ($this->input('item.password_checked') === 'true') {
            $rules['item.password'] = 'required | confirmed';
        }

        return $rules;
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

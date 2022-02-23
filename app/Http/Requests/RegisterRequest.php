<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email'    => 'unique:users|required|email|string',
            'phone'    => 'digits:10',
            'password' => 'required|min:8',
        ];
    }

    /**
     * ...
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * ...
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                'error' => $validator->errors(),
                'success' => false,
                'status_code' => 422,
            ],
        ));
    }
}

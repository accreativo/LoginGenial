<?php

namespace App\Http\Modules\Authentication\Infrastructure\Requests;

use App\Http\Modules\Shared\Utils\ApiResponseUtil;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CreateCredentialRequest extends FormRequest
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

    public function prepareForValidation()
    {
        $this->merge([
            'credential' => [
                'user'     => $this->user,
                'email'    => $this->email,
                'password' => $this->password,
            ]
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
    */

    public function rules()
    {
        return [
            'user' => array('required'),
            'email' => array('required'),
            'password' => array('required')
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'The user field is required.',
            'email.required' => 'The email field is required.',
            'password.required' => 'The password field is required.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw ApiResponseUtil::validation($validator->errors());
    }
}

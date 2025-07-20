<?php

namespace App\Http\src\Autenticacion\Requests;

use App\Http\src\Authentication\Models\CredentialModel;
use App\Http\src\Shared\Utils\ApiResponseUtil;
use Aws\Credentials\Credentials;
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
        $isValidUser = CredentialModel::isValidUser($this->user);
        $isValidEmail = CredentialModel::isValidEmail($this->email);
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
            'email' => array('required', 'email'),
            'password' => array('required', 'min_digits:6')
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'The user field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email field does not have the requested format.',
            'password.required' => 'The password field is required.',
            'min_digits.required' => 'The password field required minimum six digits.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw ApiResponseUtil::validation($validator->errors());
    }
}

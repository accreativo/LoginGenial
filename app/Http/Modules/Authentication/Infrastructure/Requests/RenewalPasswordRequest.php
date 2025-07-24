<?php

namespace App\Http\Modules\Autenticacion\Infrastructure\Requests;

use App\Http\Modules\Authentication\Models\CredentialModel;
use App\Http\Modules\Shared\Utils\ApiResponseUtil;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class RenewalPasswordRequest extends FormRequest
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

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
    */

    public function rules()
    {
        return [
            'credential' => array('required'),
            'email' => array('required', 'email')
        ];
    }

    public function messages()
    {
        return [
            'credential.required' => 'The credential field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email field does not have the requested format.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw ApiResponseUtil::validation($validator->errors());
    }
}

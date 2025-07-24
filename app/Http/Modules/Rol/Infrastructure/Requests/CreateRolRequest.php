<?php

namespace App\Http\Modules\Rol\Infrastructure\Requests;

use App\Http\Modules\Shared\Utils\ApiResponseUtil;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CreateRolRequest extends FormRequest
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
            'rol' => [
                'name' => $this->name,
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
            'name' => array('required'),
            'rol' => array('required'),
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'rol.required' => 'The rol field is required.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw ApiResponseUtil::validation($validator->errors());
    }
}

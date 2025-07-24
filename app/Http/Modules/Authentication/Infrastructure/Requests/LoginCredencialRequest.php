<?php

namespace App\Http\Modules\Autenticacion\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginCredencialRequest extends FormRequest
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
            'haveCredencial' => $this->user()??null
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
            'haveCredencial' => array('required')
        ];
    }
}

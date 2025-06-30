<?php

namespace App\Http\src\Autenticacion\Requests;

use App\Http\src\Autenticacion\Models\CredencialModel;
use Illuminate\Foundation\Http\FormRequest;

class SolicitudContrasenaRequest extends FormRequest
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
        $credencial = CredencialModel::whereCorreo($this->correo)->first();

        if ($credencial && $credencial->fl_estado && $credencial->perfil_id == 2) {
            $this->merge([
                'credencial' => $credencial
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
    */

    public function rules()
    {
        return [
            'credencial' => array('required'),
            'correo' => array('required', 'email')
        ];
    }
}

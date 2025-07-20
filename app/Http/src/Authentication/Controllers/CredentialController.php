<?php

namespace App\Http\src\Authentication\Controllers;

use App\Http\Controllers\Controller;
use App\Http\src\Autenticacion\Requests\CreateCredentialRequest;
use App\Http\src\Authentication\Models\CredentialModel;
use App\Http\src\Shared\Utils\ApiResponseUtil;
use Illuminate\Http\Request;

class CredentialController extends Controller
{
    function create(CreateCredentialRequest $request)
    {
        $newCredential = new CredentialModel();
        $newCredential->create($request->newCredential);

        $response = [
            'credential' => $newCredential
        ];

        return ApiResponseUtil::success($response);
    }
}

<?php

namespace App\Http\Modules\Rol\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\Rol\Application\RolUseCases;
use App\Http\Modules\Rol\Domain\TransferData\DTO\CreateRolDTO;
use App\Http\Modules\Rol\Infrastructure\Requests\CreateRolRequest;
use App\Http\Modules\Shared\Utils\ApiResponseUtil;

class RolController extends Controller
{
    protected RolUseCases $rolUseCases;

    public function __construct(RolUseCases $rolUseCases)
    {
        $this->rolUseCases = $rolUseCases;
    }

    function create(CreateRolRequest $request)
    {
        $dto = new CreateRolDTO($request->rol);
        $rol = $this->rolUseCases->createRol($dto);

        return ApiResponseUtil::created($rol);
    }

    function getAll()
    {
        $roles = $this->rolUseCases->getAllRoles();

        return ApiResponseUtil::success($roles);
    }
}

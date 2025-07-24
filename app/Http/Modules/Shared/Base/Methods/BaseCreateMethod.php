<?php

namespace App\Http\Modules\Shared\Base\Methods;

use App\Http\Modules\Shared\Base\Model\BaseCustomAuthenticatableModel;
use App\Http\Modules\Shared\Base\Model\BaseCustomModel;

class BaseCreateMethod
{
    static function create(BaseCustomModel | BaseCustomAuthenticatableModel $model, $dto) {
        $model->fill($dto);
        $model->save();
        $model->refresh();

        return $model;
    }
}

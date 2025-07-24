<?php

namespace App\Http\Modules\Shared\Base\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

abstract class BaseCustomAuthenticatableModel extends Authenticatable
{
    public const CREATED_AT = 'createdDateTime';
    public const UPDATED_AT = 'updatedDateTime';
    public const DELETED_AT = 'deletedDateTime';
}

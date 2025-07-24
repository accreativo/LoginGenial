<?php

namespace App\Http\Modules\Shared\Base\Model;

use Illuminate\Database\Eloquent\Model;

abstract class BaseCustomModel extends Model
{
    public const CREATED_AT = 'createdDateTime';
    public const UPDATED_AT = 'updatedDateTime';
    public const DELETED_AT = 'deletedDateTime';
}

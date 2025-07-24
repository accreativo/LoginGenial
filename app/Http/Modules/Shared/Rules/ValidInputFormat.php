<?php

namespace App\Http\Modules\Shared\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Closure;

class ValidInputFormat implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

    }
}

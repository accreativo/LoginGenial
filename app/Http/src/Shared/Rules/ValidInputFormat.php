<?php

namespace App\Http\src\Shared\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Closure;

class ValidInputFormat implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

    }
}

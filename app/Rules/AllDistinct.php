<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AllDistinct implements Rule
{
    public function passes($attribute, $value)
    {
        return count($value) === count(array_unique($value));
    }

    public function message()
    {
        return ':attribute must have unique values.';
    }
}


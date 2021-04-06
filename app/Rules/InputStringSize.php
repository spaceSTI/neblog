<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class InputStringSize implements Rule
{
    private $maxStringBytes;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($maxStringBytes)
    {
        $this->maxStringBytes = $maxStringBytes;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return strlen($value) <= $this->maxStringBytes;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Max string size exceeded';
    }
}

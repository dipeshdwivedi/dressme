<?php

namespace App\Rules;

use App\Models\Item;
use Illuminate\Contracts\Validation\Rule;

class ModelValidKeyRule implements Rule {
    private $attr;

    /**
     * Create a new rule instance.
     *
     * @param null $attr
     */
    public function __construct($attr = null) {
        $this->attr = $attr;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) {
        $_model = null;
        switch ($attribute) {
            case 'item':
                $_model = Item::class;
                break;
            default:
                return  false;
        }
        if ($_model::find($value)) return true;
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.not_in');
    }
}

<?php

namespace App\Http\Requests;

use App\Rules\ModelValidKeyRule;
use Illuminate\Foundation\Http\FormRequest;

class BuyItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'item' => ['required', new ModelValidKeyRule] // check item id exist or not as well
        ];
    }
}

<?php

namespace App\Http\Requests;

/**
 * Class ProductStoreRequest
 *
 * @package App\Http\Requests
 */
class ProductStoreRequest extends JsonFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name' => 'required|string',
            'quantity' => 'required|integer|min:1|max:99',
        ];
    }
}

<?php

namespace App\Http\Requests;

/**
 * Class ProductEditRequest
 *
 * @package App\Http\Requests
 */
class ProductEditRequest extends JsonFormRequest
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
            'id' => 'required|exists:products,id',
            'name' => 'required|string',
            'quantity' => 'required|integer|min:1|max:99',
        ];
    }
}

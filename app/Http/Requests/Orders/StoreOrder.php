<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
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
            'items' => 'required|array',
            'items.*.id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|min:1',
            'method' => 'required|in:cash,bitcoin,card',
            'address' => 'required|string',
            'post_code' => 'required|regex:/^\d{5}$/',
            'city' => 'required|string',
            'additional_notes' => 'sometimes|string|nullable'
        ];
    }
}

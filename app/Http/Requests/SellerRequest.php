<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerRequest extends FormRequest
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
            'seller_name' => 'required|string|max:255',
            'store_name' => 'required|string|max:255',
            'store_phone' => 'nullable|string|max:20',
            'store_description' => 'nullable|string',
            'store_address' => 'nullable|string',
            'store_rating' => 'nullable|numeric|min:0|max:5',
            'status' => 'required|boolean',
            'store_image' => 'nullable|string|max:255',
            'store_image_mime' => 'nullable|string|max:50',
            'store_image_size' => 'nullable|numeric',
        ];
    }
}

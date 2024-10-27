<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */

    public function rules()
    {
        return [
            'name' => ['required', 'max:55'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')],
            'role' => ['required', Rule::in([1, 2, 3])],
            'password' => ['required', Password::min(8)->numbers()->letters()]
        ];
    }
}

<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'f_name' => 'required|string|min:3',
            'l_name' => 'required|string|min:3',
            'email' => 'required|email',
            'phone' => 'required|integer|min:11|max:11',
            'password' => ['required', 'conformed', Password::min(7)->max(16)->mixedCase()->numbers()->symbols()],
        ];
    }

    public function getData(): array
    {
        return $this->validate($this->rules()) + ['is_admin' => false];
    }
}

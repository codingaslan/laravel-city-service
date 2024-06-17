<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

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
        return $this->validated();
    }

    public function messages(): array
    {
        return [
            'f_name.required' => __("The first name is required."),
            'l_name.required' => __("The last name is required."),
            'email.required' => __("The email name is required."),
            'phone.required' => __("The phone name is required."),
            'password.required' => __("The password name is required."),
            'password.conformed' => __("The password conformation does not match."),
            'phone.min' => __("The phone must be at least 11 characters."),
            'phone.max' => __("The phone must be at least 11 characters."),
            'password.min' => __("The password must be at least 7 characters."),
            'password.max' => __("The password must be at least 7 characters."),
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = response()->json([
            'status' => false,
            'code' => 422,
            'errors' => $validator->errors()->first(),
        ]);

        throw new ValidationException($validator, $response);
    }
}

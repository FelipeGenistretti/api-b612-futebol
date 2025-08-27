<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)

{

    $response = response()->json([

        'errors' => $validator->errors()

    ], 422);
 
    throw new \Illuminate\Validation\ValidationException($validator, $response);

}

 

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>['string', 'max:255', 'required'],
            "email"=>['string', 'max:255', 'required', 'email','unique:users,email'],
            "password"=>['string', 'required', 'confirmed', Password::default()]
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator ;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LogUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ];
    }

    public function failedValidation(Validator $validator){

        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => true,
            'message' => 'Error de validation',
            'errorList' => $validator -> errors()
        ]));
    }

    public function messages()
    {
        return [
            'email.required' =>'Email non fourni',
            'email.email' => 'Adresse email non valide',
            'email.exits' => 'Cette adresse n\'existe pas',
            'password.required' => 'Mot de passe non fourni'
        ] ;
    }
}

<?php

namespace App\Http\Requests\Admin;

use App\Http\Responses\PrettyJsonResponse;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class AsistenUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique(User::class)->ignore($this->user()->id)],
            'username' => ['required', 'string', Rule::unique(User::class)->ignore($this->user()->id)],
            'password' => ['nullable', 'string', 'min:8'],
            'jabatan' => ['required', 'in:KETUA,SEKRETARIS,BENDAHARA,ANGGOTA'],
        ];
    }

    public function failedValidation(Validator $validator): JsonResponse
    {
        throw new HttpResponseException(new PrettyJsonResponse(['success' => false, 'message' => 'Data yang diberikan tidak valid', 'errors' => $validator->errors()], 400));
    }
}

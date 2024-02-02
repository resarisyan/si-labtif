<?php

namespace App\Http\Requests\Admin;

use App\Http\Responses\PrettyJsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

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
            'email' => ['required', 'email', 'unique:users,email,' . $this->route('id')],
            'username' => ['required', 'string', 'unique:users,username,' .  $this->route('id')],
            'password' => ['nullable', 'string', 'min:8'],
            'jabatan' => ['required', 'in:BENDAHARA,KOORDINATOR LAB,KOORDINATOR TEKNIS,WAKIL KOORDINATOR TEKNIS,PJ DASAR,PJ JARKOM,PJ MULTI,SEKRETARIS, ANGGOTA'],
        ];
    }

    public function failedValidation(Validator $validator): JsonResponse
    {
        throw new HttpResponseException(new PrettyJsonResponse(['success' => false, 'message' => 'Data yang diberikan tidak valid', 'errors' => $validator->errors()], 400));
    }
}

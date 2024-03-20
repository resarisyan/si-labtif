<?php

namespace App\Http\Requests\Admin;

use App\Http\Responses\PrettyJsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class PenjadwalanRequest extends FormRequest
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
            'mata_praktikum_id' => ['required', 'exists:mata_praktikums,id'],
            'kelas_id' => ['required', 'exists:kelas,id'],
            'asisten_1_id' => ['required', 'exists:asistens,user_id', 'different:asisten_2_id'],
            'asisten_2_id' => ['required', 'exists:asistens,user_id', 'different:asisten_1_id'],
            'ruangan_id' => ['required', 'exists:ruangans,id'],
            'jam_mulai' => ['required', 'before:jam_berakhir'],
            'jam_berakhir' => ['required', 'after:jam_mulai'],
            'hari' => ['required', 'in:SENIN,SELASA,RABU,KAMIS,JUMAT,SABTU'],
        ];
    }

    public function failedValidation(Validator $validator): JsonResponse
    {
        throw new HttpResponseException(new PrettyJsonResponse(['success' => false, 'message' => 'Data yang diberikan tidak valid', 'errors' => $validator->errors()], 400));
    }
}

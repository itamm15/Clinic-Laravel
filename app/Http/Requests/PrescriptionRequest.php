<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrescriptionRequest extends FormRequest
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
            'patient_id'   => ['required', 'exists:patients,id'],
            'doctor_id'    => ['required', 'exists:doctors,id'],
            'visit_id'     => ['nullable', 'exists:visits,id'],
            'date'         => ['required', 'date'],
            'description'  => ['required', 'string', 'max:255'],
        ];
    }
}

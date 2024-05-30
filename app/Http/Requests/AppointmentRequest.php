<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'fullname' => ['required','string'],
            'dep_id' => ['required'],
            'doc_id' => ['required'],
            'schedule_id' => ['required'],
            'date' => ['nullable'],
            'gender' => ['required'],
            'dob'=> ['required', 'date'],
            'age' => ['required','integer'],
            'permanent_address' => ['required','string'],
            'temporary_address' => ['nullable','string'],
            'parent_name' => ['required','string'],
            'phone'  => ['required','integer','digits:10'],
            'message'=> ['nullable','string'],
            'medical_history' => ['nullable','file','mimes:pdf,doc,txt,jpg,png,jpeg'],
            'time_interval' => ['required'],
            'email' => ['required','email','unique:patients,email']
        ];
    }
}

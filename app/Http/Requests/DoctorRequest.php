<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'first_name' => ['required'],
            'middle_name' => ['string'],
            'last_name' => ['required'],
            'gender' => ['required'],
            'dob_bs' => ['required'],
            'dob_ad' => ['required'],
            'license_no' => ['required'],
            'temporary_province_no' => ['integer'],
            'temporary_district' => ['required','string'],
            'temporary_municipality_name' => ['required','string'],
            'permanent_province_no' => ['required','integer'],
            'permanent_district' => ['required','integer'],
            'permanent_municipality_name' => ['required','string'],
            'temporary_street_name' => ['required','string'],
            'permanent_street_name' => ['required','string'],
        ];
    }
}

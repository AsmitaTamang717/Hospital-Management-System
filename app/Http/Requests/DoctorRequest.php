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
            // basic details
            'first_name' => ['required','string'],
            'middle_name' => ['nullable','string'],
            'last_name' => ['required','string'],
            'gender' => ['required'],
            'dob_bs' => ['required','date'],
            'dob_ad' => ['required','date'],
            'phone' => ['required','digits:10'],
            'license_no' => ['required','integer','digits:6'],
            'image_file' => ['nullable'],
            'dep_id' =>['required'],

            //address details
            'country_id' => ['required','integer'],
            'temporary_province_id' => ['nullable','integer'],
            'temporary_district_id' => ['nullable','integer'],
            'temporary_municipality_id' => ['nullable','integer'],
            'permanent_province_id' => ['required','integer'],
            'permanent_district_id' => ['required','integer'],
            'permanent_municipality_id' => ['required','integer'],
            'temporary_street_name' => ['nullable','string'],
            'permanent_street_name' => ['required', 'string'],

            // education
            'degree.*' => ['required'],
            'specialization.*' => ['required','string'],
            'institution.*' => ['required','string'],
            'completion_year_bs.*' => ['required','date'],
            'completion_year_ad.*' => ['required','date'],
            'obtained_marks.*' => ['required','integer','between:1,100'],

            // experience
            'organization.*' => ['required','string'],
            'position.*' => ['required','string'],
            'start_date_bs.*' => ['required','date'],
            'start_date_ad.*' => ['required','date'],
            'end_date_bs.*' => ['required','date'],
            'end_date_ad.*' => ['required','date'],
            'description.*' => ['nullable'],

          
        ];
    }
}

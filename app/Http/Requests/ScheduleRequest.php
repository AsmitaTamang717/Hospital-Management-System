<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
       $rules = [
            'date' => ['date','nullable'],
            'doc_id' => ['required'],
            'from' => ['required','date_format:H:i'],
            'to' => ['required','date_format:H:i','after:from'],
            'availability' => ['required'],
            'total_quota' => ['required','integer']
        ];

        if($this->isMethod('POST')){
            $rules['days.*'] = 'required';
        }
        else if($this->isMethod('PUT')|| $this->isMethod('PATCH')){
            $rules['days'] = 'required';
        }

        return $rules;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'display_order'  =>'required|integer|unique:menus,display_order',
            'menu_type_id' =>'required',
            'parent_id' =>'nullable',
            'module_id' =>'nullable',
            'page_id'	 =>'nullable',
            'menu_name.*' =>'required',
            'external_link' =>'nullable',
            'status' =>'required|integer',
        ];

    }
}

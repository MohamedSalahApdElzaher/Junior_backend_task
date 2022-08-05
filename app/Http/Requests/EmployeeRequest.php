<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:6|max:15',
            'email' => 'required|email|unique:employees',
            'password' => 'required|min:6|max:15',
            'logo' => 'required|image|mimes:jpg,png',
            'company_id' => 'required|exists:companies,id'
        ];
    }
}

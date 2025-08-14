<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|confirmed|min:8',
            'role_id' => 'required|exists:roles,id',
            'start_of_contract' => 'required',
            'end_of_contract' => 'nullable|after:start_of_contract',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'identity_number' => 'required',
            'phone_label' => 'required|array',
            'phone_label.*' => 'required|string|max:50',
            'phone_number' => 'required|array',
            'phone_number.*' => 'required|min:11|max:13',
            'address' => 'required',
            'photo' => 'required|max:2000|image|mimes:jpg,png,jpeg',
            'cv' => 'required|mimetypes:application/pdf|max:2000|file',
            'work_experience_in_years' => 'required|integer|min:0|max:50',
            'marital_status' => 'required|in:single,married,divorced,widowed',
            'employment_type_id' => 'required|exists:employment_types,id',

        ];
    }
}
